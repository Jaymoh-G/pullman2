<div>
    <form wire:submit.prevent="apply({{$job->id}})" id="job-form" enctype="multipart/form-data" >
        <div class="row">
            <div class="col-lg-6">
                <fieldset class="fname">
                    <label for="name" class="fname-lbl">Full Name</label>
                    <span class="required">*</span><br />
                    <input
                        placeholder="Full name..."
                        class="fname"
                        wire:model="name"
                        type="text"
                        tabindex="1"

                        required
                    />
                </fieldset>

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <fieldset class="email">
                    <label for="email">Email</label>
                    <span class="required">*</span>
                    <br />
                    <input
                        placeholder="Your Email Address"
                        class="email"
                        wire:model="email"
                        type="email"
                        tabindex="2"
                        required
                    />
                </fieldset>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <fieldset class="phoneNo">
                    <label for="phoneNo">Phone</label>
                    <span class="required">*</span>
                    <br />
                    <input
                        placeholder="Your Phone Number"
                        class="phoneNo"
                        wire:model="telephone"
                        type="tel"
                        tabindex="2"
                        required
                    />
                </fieldset>
                @error('telephone')
               <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-lg-6">
                <fieldset class="fname">
                    <label for="name" class="fname-lbl"
                        >Highest education qualification</label
                    >
                    <span class="required">*</span><br />
                    <input
                        placeholder="Highest education qualification..."
                        class="fname"
                        wire:model="education_qualification"
                        type="text"
                        tabindex="1"
                        required
                    />
                </fieldset>

                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <fieldset>
                    <label for="professionalInfo">Professional Information</label>
                    <span class="required">*</span><br />
                    <textarea
                        class="
                            p-textbox-textarea
                            p-bc-grey40
                            p-bg-hv-white
                            p-bc-f-blue50
                            is-scrollable
                            autogrow
                            row-6
                        "
                        id="inp581ec24d-0d79-49bf-8e09-e90912aa5725"
                        aria-disabled="false"
                        aria-invalid="false"
                        aria-labelledby="coverLetter_title"
                        aria-required="false"
                        rows="6"
                        wire:model="professional_information"
                        type="Text"
                        style="min-height: 100px"
                        spellcheck="false"
                        required
                    ></textarea>
                </fieldset>
                @error('professional_information')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <fieldset class="resume">
                    <h2 class="upload-doc">
                        Cover Letter.
                        <span class="required">*</span>
                    </h2>
                    <label
                        class="p-file-upload resume-input"
                        for="cover_letter_path"
                    >
                        <input
                            type="file"
                            class="p-file-upload-input hidden"
                            accept=".docx, .doc, .pdf"
                            id = "cover_letter_path"
                            wire:change="$emit('handleCoverLetterUpload')"
                            aria-label=""
                            aria-labelledby=""
                            aria-hidden="true"
                            tabindex="-1"

                        />
                        <span
                            id="2e0c83ed-0d16-408e-99bc-669a63360979"
                            class="p-button basic grey width-block"
                            title=""
                            role="button"
                            aria-disabled="false"
                            tabindex="0"
                        >
                            <span class="p-icon-up-arrow-bar"
                                ><i class="fas fa-upload"></i
                            ></span>
                            <span class="p-button-text"
                                >Upload Cover Letter</span
                            ></span
                        >
                    </label>
                    <span>
                        @if(!empty($cover_letter_path))
                            {{basename($cover_letter_path)}}
                        @endif
                    </span>
                </fieldset>
                @error('cover_letter_path')
                    <span class="text-danger">{{$message}}</span>
                    </span>
                @enderror

            </div>
            <div class="col-lg-6">
                <fieldset class="resume">
                    <h2 class="upload-doc">
                        Resume
                        <span class="required">*</span>
                    </h2>
                    <label
                        class="p-file-upload resume-input"
                        for="cv_path"
                    >
                        <input
                            type="file"
                            class="p-file-upload-input hidden"
                            accept=".docx, .doc, .pdf"
                            id="cv_path"
                            wire:change="$emit('handleResumeFileUpload')"
                            aria-label=""
                            aria-labelledby=""
                            aria-hidden="true"
                            tabindex="-1"
                        />
                        <span
                            id="2e0c83ed-0d16-408e-99bc-669a63360979"
                            class="p-button basic grey width-block"
                            title=""
                            role="button"
                            aria-disabled="false"
                            tabindex="0"
                        >
                            <span class="p-icon-up-arrow-bar"
                                ><i class="fas fa-upload"></i
                            ></span>
                            <span class="p-button-text"
                                >Upload Resume/CV</span
                            ></span
                        >
                    </label>
                    <span>
                        @if(!empty($cv_path))
                            {{basename($cv_path)}}
                        @endif
                    </span>
                </fieldset>
                @error('cv_path')
                    <span span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <fieldset class="other-docs">
                    <h2 for="upload-doc">Additional Documents</h2>
                    <label class="p-file-upload resume-input" for="other_doc_path">
                        <input
                            type="file"
                            class="p-file-upload-input hidden"
                            accept=".docx, .doc, .pdf"
                            value=""
                            aria-hidden="true"
                            tabindex="-1"
                            id="other_doc_path"
                            wire:change="$emit('handleDocsFileUpload')"
                            multiple

                        />
                        <span
                            id="2e0c83ed-0d16-408e-99bc-669a63360979"
                            class="p-button basic grey width-block"
                            title=""
                            role="button"
                            aria-disabled="false"
                            tabindex="0"
                        >
                            <span class="p-icon-up-arrow-bar">
                                <i class="fas fa-upload"></i
                            ></span>
                            <span class="p-button-text">Upload Documents</span>
                        </span>
                    </label>
                    <span>
                        @if(count($other_doc_path) > 0)
                            @foreach($other_doc_path as $doc)
                                {{basename($doc)}} <br>
                            @endforeach
                        @endif
                    </span>
                </fieldset>
                @error('other_doc_path')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <fieldset>
            <button
                name="submit"
                type="submit"
                id="contact-submit"
                data-submit="...Sending"
            >
                Submit Application
            </button>
        </fieldset>
    </form>
    <script>
        document.addEventListener('livewire:load', () => {
            window.livewire.on('handleCoverLetterUpload', () => {
                let inputField = document.getElementById('cover_letter_path');
                try {
                    emitData(inputField);
                } catch (error) {
                    console.error(error);
                }
            });
            window.livewire.on('handleResumeFileUpload', () => {
                let inputField = document.getElementById('cv_path')
                try {
                    emitData(inputField);
                } catch (error) {
                    console.error(error);
                }
            });
            window.livewire.on('handleDocsFileUpload', () => {
                let inputField = document.getElementById('other_doc_path')
                try {
                    emitData(inputField);
                } catch (error) {
                    console.error(error);
                }
            });
        });

        const emitData = (inputField) => {
            Object.entries(inputField.files).forEach(([key, file]) => {
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('set_file_data', getFileNameData(inputField, file));
                    window.livewire.emit('file_upload', reader.result)
                }
                reader.readAsDataURL(file);
            });
        }

        const getFileNameData = (inputField, file) => {
            return {
                file_name: file.name,
                file_extension: file.name.split('.').pop(),
                file_name_without_extension: file.name.split('.').shift(),
                file_size: file.size,
                id: inputField.id
            };
        }

    </script>
</div>
