from PIL import Image
import os

# Use apple-touch as a stable full-logo source if present after first run;
# prefer a dedicated source copy if we kept one.
candidates = [
    os.path.join('public', 'images', 'logo_favicon_source.png'),
    os.path.join('public', 'android-chrome-512x512.png'),
    os.path.join('public', 'apple-touch-icon.png'),
]
src_path = next(p for p in candidates if os.path.exists(p))
out_dir = 'public'
src = Image.open(src_path).convert('RGBA')
w, h = src.size
print('source', src_path, w, h)

# Upscale small sources so crops stay sharp
if max(w, h) < 512:
    scale = 512 / max(w, h)
    src = src.resize((int(w * scale), int(h * scale)), Image.Resampling.LANCZOS)
    w, h = src.size
    print('upscaled to', w, h)

pixels = src.load()
min_x, min_y, max_x, max_y = w, h, 0, 0
for y in range(h):
    for x in range(w):
        r, g, b, a = pixels[x, y]
        if a < 10:
            continue
        if r > 245 and g > 245 and b > 245:
            continue
        min_x = min(min_x, x)
        min_y = min(min_y, y)
        max_x = max(max_x, x)
        max_y = max(max_y, y)
print('content bbox', min_x, min_y, max_x, max_y)

content_h = max_y - min_y + 1
content_w = max_x - min_x + 1

# Detect horizontal "gap" between icon and wordmark by scanning row density
row_counts = []
for y in range(min_y, max_y + 1):
    count = 0
    for x in range(min_x, max_x + 1):
        r, g, b, a = pixels[x, y]
        if a < 10:
            continue
        if r > 245 and g > 245 and b > 245:
            continue
        count += 1
    row_counts.append(count)

# Find a sparse band after the dense icon block
threshold = max(1, int(content_w * 0.08))
mark_end_rel = int(content_h * 0.55)
# Prefer first sparse stretch in the upper-middle area
sparse_run = 0
for i, count in enumerate(row_counts):
    rel = i / float(content_h)
    if 0.30 <= rel <= 0.65:
        if count < threshold:
            sparse_run += 1
            if sparse_run >= 4:
                mark_end_rel = i - 3
                break
        else:
            sparse_run = 0

mark_bottom = min_y + max(int(content_h * 0.35), mark_end_rel)
print('mark_bottom_rel', (mark_bottom - min_y) / float(content_h), 'mark_bottom', mark_bottom)

mark = src.crop((min_x, min_y, max_x + 1, mark_bottom))
mw, mh = mark.size
side = max(mw, mh)
pad = int(side * 0.14)
canvas = side + pad * 2
mark_sq = Image.new('RGBA', (canvas, canvas), (255, 255, 255, 255))
mark_sq.paste(mark, ((canvas - mw) // 2, (canvas - mh) // 2), mark)

full_sq = Image.new('RGBA', (w, h), (255, 255, 255, 255))
full_sq.paste(src, (0, 0), src)


def save_png(img, path, size):
    out = img.resize((size, size), Image.Resampling.LANCZOS)
    bg = Image.new('RGB', (size, size), (255, 255, 255))
    if out.mode == 'RGBA':
        bg.paste(out, mask=out.split()[3])
    else:
        bg.paste(out)
    bg.save(path, format='PNG', optimize=True)
    print('wrote', path, size)


# Keep a source snapshot so reruns stay stable
source_snapshot = os.path.join('public', 'images', 'logo_favicon_source.png')
if not os.path.exists(source_snapshot) or src_path != source_snapshot:
    # Save original full composition before overwriting outputs
    full_sq.resize((512, 512), Image.Resampling.LANCZOS).save(source_snapshot)
    print('saved source snapshot', source_snapshot)

save_png(mark_sq, os.path.join(out_dir, 'favicon-16x16.png'), 16)
save_png(mark_sq, os.path.join(out_dir, 'favicon-32x32.png'), 32)
save_png(mark_sq, os.path.join(out_dir, 'mstile-150x150.png'), 150)

save_png(full_sq, os.path.join(out_dir, 'apple-touch-icon.png'), 180)
save_png(full_sq, os.path.join(out_dir, 'android-chrome-192x192.png'), 192)
save_png(full_sq, os.path.join(out_dir, 'android-chrome-512x512.png'), 512)

ico_sizes = [(16, 16), (32, 32), (48, 48)]
ico_images = []
for size in ico_sizes:
    im = mark_sq.resize(size, Image.Resampling.LANCZOS)
    bg = Image.new('RGBA', size, (255, 255, 255, 255))
    bg.paste(im, mask=im.split()[3] if im.mode == 'RGBA' else None)
    ico_images.append(bg.convert('RGBA'))

ico_path = os.path.join(out_dir, 'favicon.ico')
ico_images[0].save(ico_path, format='ICO', sizes=ico_sizes, append_images=ico_images[1:])
print('wrote', ico_path)
print('done')
