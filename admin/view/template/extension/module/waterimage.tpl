<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-waterimage" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if (isset($error['error_warning'])) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error['error_warning']; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $heading_title; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-waterimage" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="entry-status"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_status" id="entry-status" class="form-control">
                                <?php if ($waterimage_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-image"><?php echo $entry_image; ?></label>
                        <div class="col-sm-10">
                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                            <input type="hidden" name="waterimage_image" value="<?php echo $waterimage_image; ?>" id="input-image" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category-image"><?php echo $entry_category_image; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_category_image" id="entry-latest" class="form-control">
                                <?php if ($waterimage_category_image) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product-image-thumb"><?php echo $entry_product_image_thumb; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_product_image_thumb" id="entry-product-image-thumb" class="form-control">
                                <?php if ($waterimage_product_image_thumb) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product-image-popup"><?php echo $entry_product_image_popup; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_product_image_popup" id="entry-product-image-popup" class="form-control">
                                <?php if ($waterimage_product_image_popup) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="product-image-list"><?php echo $entry_product_image_list; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_product_image_list" id="entry-product-image-list" class="form-control">
                                <?php if ($waterimage_product_image_list) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="additional-product-image"><?php echo $entry_additional_product_image; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_additional_product_image" id="entry-additional-product-image" class="form-control">
                                <?php if ($waterimage_additional_product_image) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="related-product-image"><?php echo $entry_related_product_image; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_related_product_image" id="entry-related-product-image" class="form-control">
                                <?php if ($waterimage_related_product_image) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="compare-image"><?php echo $entry_compare_image; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_compare_image" id="entry-compare-image" class="form-control">
                                <?php if ($waterimage_compare_image) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="wishlist-image"><?php echo $entry_wishlist_image; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_wishlist_image" id="entry-wishlist-image" class="form-control">
                                <?php if ($waterimage_wishlist_image) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="cart-image"><?php echo $entry_cart_image; ?></label>
                        <div class="col-sm-10">
                            <select name="waterimage_cart_image" id="entry-cart-image" class="form-control">
                                <?php if ($waterimage_cart_image) { ?>
                                <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                <option value="0"><?php echo $text_no; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_yes; ?></option>
                                <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="size-image"><?php echo $entry_size_image; ?></label>
                        <div class="col-sm-10">
                            <table id="module" class="list">
                                <thead>
                                    <tr>
                                        <td class="left"><?php echo 'W X H'; ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="waterimage_size_width1" value="<?php echo $waterimage_size_width1; ?>" size="3" />X
                                            <input type="text" name="waterimage_size_height1" value="<?php echo $waterimage_size_height1; ?>" size="3" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="waterimage_size_width2" value="<?php echo $waterimage_size_width2; ?>" size="3" />X
                                            <input type="text" name="waterimage_size_height2" value="<?php echo $waterimage_size_height2; ?>" size="3" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="waterimage_size_width3" value="<?php echo $waterimage_size_width3; ?>" size="3" />X
                                            <input type="text" name="waterimage_size_height3" value="<?php echo $waterimage_size_height3; ?>" size="3" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="waterimage_size_width4" value="<?php echo $waterimage_size_width4; ?>" size="3" />X
                                            <input type="text" name="waterimage_size_height4" value="<?php echo $waterimage_size_height4; ?>" size="3" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="waterimage_size_width5" value="<?php echo $waterimage_size_width5; ?>" size="3" />X
                                            <input type="text" name="waterimage_size_height5" value="<?php echo $waterimage_size_height5; ?>" size="3" />
                                        </td>
                                    </tr>

                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="entry-pros"><?php echo $entry_pros; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="waterimage_pros" value="<?php echo $waterimage_pros; ?>" placeholder="<?php echo $entry_pros; ?>" id="entry-pros" class="form-control"/>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <?php echo $footer; ?>

        <!------------->
