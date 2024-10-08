<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  
<div class="content-body">
  <!-- account setting page start -->
  <section id="page-account-settings">
      <div class="row">
          <!-- left menu section -->
          <div class="col-md-3 mb-2 mb-md-0">
              <ul class="nav nav-pills flex-column mt-md-0 mt-1">

                  <li class="nav-item">
                      <a class="nav-link d-flex py-75 active" id="account-pill-main" data-toggle="pill" href="#account-vertical-main" aria-expanded="true">
                          <i class="feather icon-globe mr-50 font-medium-3"></i>
                          <?php echo e(__('admin.app_setting')); ?>

                      </a>
                  </li>
                  <li class="nav-item" style="margin-top: 3px">
                      <a class="nav-link d-flex py-75" id="account-pill-texts" data-toggle="pill" href="#account-vertical-texts" aria-expanded="false">
                          <i class="feather icon-edit mr-50 font-medium-3"></i>
                          <?php echo e(__('admin.Frequent_texts')); ?>

                      </a>
                  </li>
                  <li class="nav-item" style="margin-top: 3px">
                      <a class="nav-link d-flex py-75" id="account-pill-about" data-toggle="pill" href="#account-vertical-about" aria-expanded="false">
                          <i class="feather icon-file mr-50 font-medium-3"></i>
                          <?php echo e(__('admin.about_app')); ?>

                      </a>
                  </li>

              </ul>
          </div>
          <!-- right content section -->
          <div class="col-md-9">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <div class="tab-content">

                              <div role="tabpanel" class="tab-pane active" id="account-vertical-main" aria-labelledby="account-pill-main" aria-expanded="true">
                                <form action="<?php echo e(route('admin.settings.update')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate >
                                  <?php echo method_field('put'); ?>
                                  <?php echo csrf_field(); ?>
                                <div class="row">
                                  <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.name_of_induction_in_arabic')); ?></label>
                                                <input type="text" class="form-control" name="intro_name_ar" id="account-name" placeholder="<?php echo e(__('admin.name_of_induction_in_arabic')); ?>" value="<?php echo e($data['intro_name_ar']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.name_of_the_induction_of_english')); ?></label>
                                                <input type="text" class="form-control" name="intro_name_en" id="account-name" placeholder="<?php echo e(__('admin.name_of_the_induction_of_english')); ?>" value="<?php echo e($data['intro_name_en']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.email')); ?></label>
                                                <input type="email" class="form-control" name="intro_email" id="account-name" placeholder="<?php echo e(__('admin.email')); ?>" value="<?php echo e($data['intro_email']); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" data-validation-email-message="<?php echo e(__('admin.email_formula_is_incorrect')); ?>"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.phone')); ?></label>
                                                <input type="text" class="form-control" name="intro_phone" minlength="10" id="account-name" placeholder="<?php echo e(__('admin.phone')); ?>" value="<?php echo e($data['intro_phone']); ?>" required data-validation-required-message="<?php echo e(__('admin.this_field_is_required')); ?>" data-validation-minlength-message="<?php echo e(__('admin.the_number_should_only_be_less_than_ten_numbers')); ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.address')); ?></label>
                                                <input type="text" class="form-control" name="intro_address" id="account-name" placeholder="<?php echo e(__('admin.address')); ?>" value="<?php echo e($data['intro_address']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.intro_working_hours')); ?> AR</label>
                                                <input type="text" class="form-control" name="intro_working_hours_ar" id="account-name" placeholder="<?php echo e(__('admin.intro_working_hours')); ?> AR" value="<?php echo e($data['intro_working_hours_ar']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.intro_working_hours')); ?> EN</label>
                                                <input type="text" class="form-control" name="intro_working_hours_en" id="account-name" placeholder="<?php echo e(__('admin.intro_working_hours')); ?> EN" value="<?php echo e($data['intro_working_hours_en']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                      <div class="row justify-content-center">
                                
                                        <div class="imgMontg col-lg-4 col-md-12 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-lg-column flex-wrap flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="intro_logo" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="<?php echo e($data['intro_logo']); ?>">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span><?php echo e(__('admin.logo_image_induction')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="logo" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="<?php echo e($data['logo']); ?>">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span><?php echo e(__('admin.logo_image')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="fav_icon" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="<?php echo e($data['fav_icon']); ?>">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span><?php echo e(__('admin.fav_icon_image')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                      </div>
                                
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button"><?php echo e(__('admin.saving_changes')); ?></button>
                                        <a href="<?php echo e(url()->previous()); ?>" type="reset" class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.back')); ?></a>
                                    </div>
                                </div>
                                </form>
                              </div>
                              
                              <div role="tabpanel" class="tab-pane" id="account-vertical-texts" aria-labelledby="account-pill-texts" aria-expanded="false">
                                <form action="<?php echo e(route('admin.settings.update')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo method_field('put'); ?>
                                    <?php echo csrf_field(); ?>

                                    <div class="row">
                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.address_of_our_services_section_in_arabic')); ?></label>
                                                  <textarea class="form-control" name="services_text_ar" id="services_text_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.address_of_our_services_section_in_arabic')); ?>"><?php echo e($data['services_text_ar']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.the_title_of_our_english_service_department')); ?></label>
                                                  <textarea class="form-control" name="services_text_en" id="services_text_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.the_title_of_our_english_service_department')); ?>"><?php echo e($data['services_text_en']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.team_in_arabic')); ?></label>
                                                  <textarea class="form-control" name="team_text_ar" id="team_text_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.team_in_arabic')); ?>"><?php echo e($data['team_text_ar']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.team_in_english')); ?></label>
                                                  <textarea class="form-control" name="team_text_en" id="team_text_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.team_in_english')); ?>"><?php echo e($data['team_text_en']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.portfolio_in_arabic')); ?></label>
                                                  <textarea class="form-control" name="portfolio_text_ar" id="portfolio_text_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.portfolio_in_arabic')); ?>"><?php echo e($data['portfolio_text_ar']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.portfolio_in_english')); ?></label>
                                                  <textarea class="form-control" name="portfolio_text_en" id="portfolio_text_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.portfolio_in_english')); ?>"><?php echo e($data['portfolio_text_en']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.the_title_of_our_partition_in_arabic')); ?></label>
                                                  <textarea class="form-control" name="parteners_text_ar" id="parteners_text_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.the_title_of_our_partition_in_arabic')); ?>"><?php echo e($data['parteners_text_ar']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.the_title_of_our_english_partition')); ?></label>
                                                  <textarea class="form-control" name="parteners_text_en" id="parteners_text_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.the_title_of_our_english_partition')); ?>"><?php echo e($data['parteners_text_en']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="account-name"><?php echo e(__('admin.address_in_arabic_communication')); ?></label>
                                                  <textarea class="form-control" name="contact_text_ar" id="contact_text_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.address_in_arabic_communication')); ?>"><?php echo e($data['contact_text_ar']); ?></textarea>
                                              </div>
                                          </div>
                                      </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.address_in_english_communication')); ?></label>
                                                    <textarea class="form-control" name="contact_text_en" id="contact_text_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.address_in_english_communication')); ?>"><?php echo e($data['contact_text_en']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button"><?php echo e(__('admin.saving_changes')); ?></button>
                                          <a href="<?php echo e(url()->previous()); ?>" type="reset" class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.back')); ?></a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                              <div role="tabpanel" class="tab-pane" id="account-vertical-about" aria-labelledby="account-pill-about" aria-expanded="false">
                                <form action="<?php echo e(route('admin.settings.update')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo method_field('put'); ?>
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="row">
                                          <div class="imgMontg col-6 text-center">
                                              <div class="dropBox">
                                                  <div class="textCenter d-flex flex-lg-column">
                                                      <div class="imagesUploadBlock">
                                                          <label class="uploadImg">
                                                              <span><i class="feather icon-image"></i></span>
                                                              <input type="file" accept="image/*" name="about_image_1" class="imageUploader">
                                                          </label>
                                                          <div class="uploadedBlock">
                                                              <img src="<?php echo e($data['about_image_1']); ?>">
                                                              <button class="close"><i class="feather icon-trash-2"></i></button>
                                                          </div>
                                                        </div>
                                                        <span><?php echo e(__('admin.about_us_video_image')); ?></span>
                                                  </div>
                                              </div>
                                          </div>
                                          
                                          <div class="imgMontg col-6 text-center">
                                              <div class="dropBox">
                                                  <div class="textCenter d-flex flex-lg-column">
                                                      <div class="imagesUploadBlock">
                                                          <label class="uploadImg">
                                                              <span><i class="feather icon-image"></i></span>
                                                              <input type="file" name="intro_about_video" class="imageUploader">
                                                          </label>
                                                          <div class="uploadedBlock">
                                                              <img src="<?php echo e($data['intro_about_video']); ?>">
                                                              <button class="close"><i class="feather icon-trash-2"></i></button>
                                                          </div>
                                                        </div>
                                                        <span><?php echo e(__('admin.about_video')); ?></span>
                                                  </div>
                                              </div>
                                          </div>

                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.intro_about_title_ar')); ?></label>
                                                <input class="form-control" name="intro_about_title_ar" value="<?php echo e($data['intro_about_title_ar']); ?>" placeholder="<?php echo e(__('admin.about_the_arabic_application')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name"><?php echo e(__('admin.intro_about_title_en')); ?></label>
                                                <input class="form-control" name="intro_about_title_en" value="<?php echo e($data['intro_about_title_en']); ?>"  placeholder="<?php echo e(__('admin.intro_about_title_en')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.about_the_arabic_application')); ?></label>
                                                    <textarea class="form-control" name="intro_about_ar" id="intro_about_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.about_the_arabic_application')); ?>"><?php echo e($data['intro_about_ar']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.about_the_english_application')); ?></label>
                                                    <textarea class="form-control" name="intro_about_en" id="intro_about_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.about_the_english_application')); ?>"><?php echo e($data['intro_about_en']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step1_title_ar')); ?></label>
                                                    <input class="form-control" name="intro_about_step1_title_ar" value="<?php echo e($data['intro_about_step1_title_ar']); ?>"  placeholder="<?php echo e(__('admin.intro_about_step1_title_ar')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step1_title_en')); ?></label>
                                                    <input class="form-control" name="intro_about_step1_title_en" value="<?php echo e($data['intro_about_step1_title_en']); ?>"  placeholder="<?php echo e(__('admin.intro_about_step1_title_en')); ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step1_ar')); ?></label>
                                                    <textarea class="form-control" name="intro_about_step1_ar" id="intro_about_step1_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.intro_about_step1_ar')); ?>"><?php echo e($data['intro_about_step1_ar']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step1_en')); ?></label>
                                                    <textarea class="form-control" name="intro_about_step1_en" id="intro_about_step1_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.intro_about_step1_en')); ?>"><?php echo e($data['intro_about_step1_en']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step2_title_ar')); ?></label>
                                                    <input class="form-control" name="intro_about_step2_title_ar" value="<?php echo e($data['intro_about_step2_title_ar']); ?>"  placeholder="<?php echo e(__('admin.intro_about_step2_title_ar')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step2_title_en')); ?></label>
                                                    <input class="form-control" name="intro_about_step2_title_en" value="<?php echo e($data['intro_about_step2_title_en']); ?>"  placeholder="<?php echo e(__('admin.intro_about_step2_title_en')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step2_ar')); ?></label>
                                                    <textarea class="form-control" name="intro_about_step2_ar" id="intro_about_step2_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.intro_about_step2_ar')); ?>"><?php echo e($data['intro_about_step2_ar']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step2_en')); ?></label>
                                                    <textarea class="form-control" name="intro_about_step2_en" id="intro_about_step2_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.intro_about_step2_en')); ?>"><?php echo e($data['intro_about_step2_en']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step3_title_ar')); ?></label>
                                                    <input class="form-control" name="intro_about_step3_title_ar" value="<?php echo e($data['intro_about_step3_title_ar']); ?>"  placeholder="<?php echo e(__('admin.intro_about_step3_title_ar')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step3_title_en')); ?></label>
                                                    <input class="form-control" name="intro_about_step3_title_en" value="<?php echo e($data['intro_about_step3_title_en']); ?>"  placeholder="<?php echo e(__('admin.intro_about_step3_title_en')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step3_ar')); ?></label>
                                                    <textarea class="form-control" name="intro_about_step3_ar" id="intro_about_step3_ar_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.intro_about_step3_ar')); ?>"><?php echo e($data['intro_about_step3_ar']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name"><?php echo e(__('admin.intro_about_step3_en')); ?></label>
                                                    <textarea class="form-control" name="intro_about_step3_en" id="intro_about_step3_en_editor" cols="30" rows="10" placeholder="<?php echo e(__('admin.intro_about_step3_en')); ?>"><?php echo e($data['intro_about_step3_en']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button"><?php echo e(__('admin.saving_changes')); ?></button>
                                          <a href="<?php echo e(url()->previous()); ?>" type="reset" class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.back')); ?></a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- account setting page end -->

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')); ?>"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
    <script>
        <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            CKEDITOR.replace( 'services_text_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'team_text_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'portfolio_text_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'parteners_text_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'contact_text_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'intro_about_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'intro_about_step1_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'intro_about_step2_<?php echo e($lang); ?>_editor' );
            CKEDITOR.replace( 'intro_about_step3_<?php echo e($lang); ?>_editor' );
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </script>
    
    <?php echo $__env->make('admin.shared.addImage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohmmedmaree/Desktop/projects/heli_id/resources/views/admin/intro_setting/index.blade.php ENDPATH**/ ?>