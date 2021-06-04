<div id="questionnaire-section">
    <div class="default-section">
        <?php echo form_open_multipart('user/questionnaire'); ?>
            <div class="container">
                <div class="questionnaire-wrapper show">
                    <div class="questionnaire-content-wrapper" id="section1">
                        <h2 class="text-white text-center"><b>Hello, I'm Lyn</b></h2>
                        <h2 class="text-white text-center mb-3  font-sub"><b>Please tell me your name</b></h2>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="btn btn-primary btn-lg btn-block" id="next">NEXT</div>
                    </div>
                </div>

                <div class="questionnaire-wrapper">
                    <div class="questionnaire-content-wrapper" id="section2">
                        <div class="d-flex">
                            <h2 class="text-white text-center"><b>Nice to know you, &nbsp;</b></h2>
                            <h2 class="text-white name" id="nameInput"></h2>
                        </div>

                        <h2 class="text-white text-center mb-3  font-sub"><b>How old are you?</b></h2>
                        <div class="form-group">
                            <input type="number" class="form-control" name="age" id="age" min="17" max="99" required>
                        </div>
                        <div class="btn btn-primary btn-lg btn-block" id="next2">NEXT</div>
                    </div>
                </div>

                <div class="questionnaire-wrapper">
                    <div class="questionnaire-content-wrapper" id="section3">
                        <h2 class="text-white text-center"><b>Choose your favorite category</b></h2>

                        <div class="card-category-wrapper">

                            <div class="selection-wrapper">
                                <label for="selected-item-1" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Technology" id="selected-item-1">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/group-friends-giving-high-five_23-2148363170.jpg" alt="">
                                        <h4>Technology</h4>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-2" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Food" id="selected-item-2">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/people-putting-puzzle-pieces-together_52683-28610.jpg" alt="">
                                        <h4>Food</h4>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-3" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Otomotive" id="selected-item-3">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/people-putting-puzzle-pieces-together_52683-28610.jpg" alt="">
                                        <h4>Otomotive</h4>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-4" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Fashion" id="selected-item-4">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/people-putting-puzzle-pieces-together_52683-28610.jpg" alt="">
                                        <h4>Fashion</h4>
                                    </div>
                                </label>
                            </div>


                            <div class="selection-wrapper">
                                <label for="selected-item-5" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Furniture" id="selected-item-5">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/group-friends-giving-high-five_23-2148363170.jpg" alt="">
                                        <h4>Furniture</h4>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-6" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Fintech" id="selected-item-6">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/people-putting-puzzle-pieces-together_52683-28610.jpg" alt="">
                                        <h4>Fintech</h4>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-7" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Health" id="selected-item-7">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/people-putting-puzzle-pieces-together_52683-28610.jpg" alt="">
                                        <h4>Health</h4>
                                    </div>
                                </label>
                            </div>
                            <div class="selection-wrapper">
                                <label for="selected-item-8" class="selected-label">
                                    <input type="checkbox" name="category[]" value="Academic" id="selected-item-8">
                                    <span class="icon"></span>
                                    <div class="selected-content">
                                        <img src="https://image.freepik.com/free-vector/people-putting-puzzle-pieces-together_52683-28610.jpg" alt="">
                                        <h4>Academic</h4>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="btn btn-primary btn-lg btn-block" id="next3">NEXT</div>
                    </div>
                </div>

                <div class="questionnaire-wrapper">
                    <div class="questionnaire-content-wrapper" id="section4">
                        <input type="hidden" value="<?= $user['idUser']; ?>" name="idUser"/>
                        <h2 class="text-white text-center"><b>Thank you for answering</b></h2>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Go To Event Page</button>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>

</div>