<div id="questionnaire-section">
    <div class="default-section">
        <?php echo form_open_multipart('tenant/questionnaireTenant'); ?>
            <div class="questionnaire-wrapper show">
                <div class="questionnaire-content-wrapper" id="section1">
                    <h2 class="text-white text-center"><b>Hello, I'm Lyn</b></h2>
                    <h2 class="text-white text-center mb-3  font-sub"><b>Please tell me your about company</b></h2>
                    <div class="btn btn-primary btn-lg btn-block" id="nextTenant">NEXT</div>
                </div>
            </div>

            <div class="questionnaire-wrapper">
                <div class="questionnaire-content-wrapper" id="section2">
                    <h2 class="text-white text-center"><b>This company is engaged in</b></h2>
                    <div class="form-group">
                        <select class="custom-select" id="category" name="category">
                            <option value="" selected>Open this select menu</option>
                            <option value="Technology">Technology</option>
                            <option value="Food">Food</option>
                            <option value="Otomotive">Otomotive</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Fintech">Fintech</option>
                            <option value="Health">Health</option>
                            <option value="Academic">Academic</option>
                        </select>
                    </div>
                    <div class="btn btn-primary btn-lg btn-block" id="nextTenant2">NEXT</div>
                </div>
            </div>

            <div class="questionnaire-wrapper">
                <div class="questionnaire-content-wrapper" id="section3">
                    <h2 class="text-white text-center mb-3  font-sub"><b>Please tell me your company address</b></h2>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <div class="btn btn-primary btn-lg btn-block" id="nextTenant3">NEXT</div>
                </div>
            </div>

            <div class="questionnaire-wrapper">
                <div class="questionnaire-content-wrapper" id="section4">
                    <h2 class="text-white text-center mb-3  font-sub"><b>Upload your company logo</b></h2>
                    <div class="form-group">
                        <div class="upload-image-wrapper">
                            <div class="image-output">
                                <div class="button-reupload">
                                    <div class="btn btn-danger btn-sm">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <img id="output" />
                            </div>
                            <div class="upload-wrapper">
                                <input class="input" type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)">
                                <div class="upload-button">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    <label for="file">Upload Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn btn-primary btn-lg btn-block" id="nextTenant4">NEXT</div>
                </div>
            </div>

            <div class="questionnaire-wrapper">
                <div class="questionnaire-content-wrapper" id="section5">
                    <input type="hidden" value="<?= $user['email']; ?>" name="email"/>
                    <input type="hidden" value="<?= $user['idCompany']; ?>" name="idCompany"/>
                    <h2 class="text-white text-center"><b>Thank you for answering</b></h2>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Go To Event Page</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>