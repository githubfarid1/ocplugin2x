<?php

class ControllerExtensionModuleWaterimage extends Controller {

    private $error = array();

    public function index() {
        $this->load->language('extension/module/waterimage');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('waterimage', $this->request->post);
            //DELETE CACHE IMAGE
            $this->delTree(DIR_IMAGE.'cache/');
            mkdir(DIR_IMAGE.'cache/');
            //------------------
            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'));
        }


        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();
        $data['languages'] = $languages;

        $data['heading_title'] = $this->language->get('heading_title');


        $data['entry_creator'] = $this->language->get('entry_creator');
        $data['entry_version'] = $this->language->get('entry_version');
        $data['entry_updated'] = $this->language->get('entry_updated');
        $data['entry_licence'] = $this->language->get('entry_licence');


        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_status_desc'] = $this->language->get('entry_status_desc');


        $data['entry_image'] = $this->language->get('entry_image');
        $data['entry_image_desc'] = $this->language->get('entry_image_desc');

        $data['entry_category_image'] = $this->language->get('entry_category_image');
        $data['entry_product_image_thumb'] = $this->language->get('entry_product_image_thumb');
        $data['entry_product_image_popup'] = $this->language->get('entry_product_image_popup');
        $data['entry_product_image_list'] = $this->language->get('entry_product_image_list');
        $data['entry_additional_product_image'] = $this->language->get('entry_additional_product_image');
        $data['entry_related_product_image'] = $this->language->get('entry_related_product_image');
        $data['entry_compare_image'] = $this->language->get('entry_compare_image');
        $data['entry_wishlist_image'] = $this->language->get('entry_wishlist_image');
        $data['entry_cart_image'] = $this->language->get('entry_cart_image');
        $data['entry_manufacturer_image'] = $this->language->get('entry_manufacturer_image');
        $data['entry_size_image'] = $this->language->get('entry_size_image');

        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');


        $data['entry_pros'] = $this->language->get('entry_pros');
        $data['entry_pros_desc'] = $this->language->get('entry_pros_desc');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['code'])) {
            $data['error_code'] = $this->error['code'];
        } else {
            $data['error_code'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/waterimage', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['action'] = $this->url->link('extension/module/waterimage', 'token=' . $this->session->data['token'], 'SSL');

        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL');

        $data['modules'] = array();

        if (isset($this->request->post['waterimage_status'])) {
            $data['waterimage_status'] = $this->request->post['waterimage_status'];
        } elseif ($this->config->get('waterimage_status')) {
            $data['waterimage_status'] = $this->config->get('waterimage_status');
        } else
            $data['waterimage_status'] = '';

        if (isset($this->request->post['waterimage_detail'])) {
            $data['waterimage_detail'] = $this->request->post['waterimage_detail'];
        } elseif ($this->config->get('waterimage_detail')) {
            $data['waterimage_detail'] = $this->config->get('waterimage_detail');
        } else
            $data['waterimage_detail'] = '';

        if (isset($this->request->post['waterimage_category_image'])) {
            $data['waterimage_category_image'] = $this->request->post['waterimage_category_image'];
        } else {
            $data['waterimage_category_image'] = $this->config->get('waterimage_category_image');
        }
        if (isset($this->request->post['waterimage_product_image_thumb'])) {
            $data['waterimage_product_image_thumb'] = $this->request->post['waterimage_product_image_thumb'];
        } else {
            $data['waterimage_product_image_thumb'] = $this->config->get('waterimage_product_image_thumb');
        }
        if (isset($this->request->post['waterimage_product_image_popup'])) {
            $data['waterimage_product_image_popup'] = $this->request->post['waterimage_product_image_popup'];
        } else {
            $data['waterimage_product_image_popup'] = $this->config->get('waterimage_product_image_popup');
        }
        if (isset($this->request->post['waterimage_product_image_list'])) {
            $data['waterimage_product_image_list'] = $this->request->post['waterimage_product_image_list'];
        } else {
            $data['waterimage_product_image_list'] = $this->config->get('waterimage_product_image_list');
        }
        if (isset($this->request->post['waterimage_additional_product_image'])) {
            $data['waterimage_additional_product_image'] = $this->request->post['waterimage_additional_product_image'];
        } else {
            $data['waterimage_additional_product_image'] = $this->config->get('waterimage_additional_product_image');
        }
        if (isset($this->request->post['waterimage_related_product_image'])) {
            $data['waterimage_related_product_image'] = $this->request->post['waterimage_related_product_image'];
        } else {
            $data['waterimage_related_product_image'] = $this->config->get('waterimage_related_product_image');
        }
        if (isset($this->request->post['waterimage_compare_image'])) {
            $data['waterimage_compare_image'] = $this->request->post['waterimage_compare_image'];
        } else {
            $data['waterimage_compare_image'] = $this->config->get('waterimage_compare_image');
        }
        if (isset($this->request->post['waterimage_wishlist_image'])) {
            $data['waterimage_wishlist_image'] = $this->request->post['waterimage_wishlist_image'];
        } else {
            $data['waterimage_wishlist_image'] = $this->config->get('waterimage_wishlist_image');
        }
        if (isset($this->request->post['waterimage_cart_image'])) {
            $data['waterimage_cart_image'] = $this->request->post['waterimage_cart_image'];
        } else {
            $data['waterimage_cart_image'] = $this->config->get('waterimage_cart_image');
        }

        if (isset($this->request->post['waterimage_manufacturer_image'])) {
            $data['waterimage_manufacturer_image'] = $this->request->post['waterimage_manufacturer_image'];
        } else {
            $data['waterimage_manufacturer_image'] = $this->config->get('waterimage_manufacturer_image');
        }

        if (isset($this->request->post['waterimage_size_width1'])) {
            $data['waterimage_size_width1'] = $this->request->post['waterimage_size_width1'];
        } else {
            $data['waterimage_size_width1'] = $this->config->get('waterimage_size_width1');
        }
        if (isset($this->request->post['waterimage_size_height1'])) {
            $data['waterimage_size_height1'] = $this->request->post['waterimage_size_height1'];
        } else {
            $data['waterimage_size_height1'] = $this->config->get('waterimage_size_height1');
        }

        if (isset($this->request->post['waterimage_size_width2'])) {
            $data['waterimage_size_width2'] = $this->request->post['waterimage_size_width2'];
        } else {
            $data['waterimage_size_width2'] = $this->config->get('waterimage_size_width2');
        }
        if (isset($this->request->post['waterimage_size_height2'])) {
            $data['waterimage_size_height2'] = $this->request->post['waterimage_size_height2'];
        } else {
            $data['waterimage_size_height2'] = $this->config->get('waterimage_size_height2');
        }
        if (isset($this->request->post['waterimage_size_width3'])) {
            $data['waterimage_size_width3'] = $this->request->post['waterimage_size_width3'];
        } else {
            $data['waterimage_size_width3'] = $this->config->get('waterimage_size_width3');
        }
        if (isset($this->request->post['waterimage_size_height3'])) {
            $data['waterimage_size_height3'] = $this->request->post['waterimage_size_height3'];
        } else {
            $data['waterimage_size_height3'] = $this->config->get('waterimage_size_height3');
        }
        if (isset($this->request->post['waterimage_size_width4'])) {
            $data['waterimage_size_width4'] = $this->request->post['waterimage_size_width4'];
        } else {
            $data['waterimage_size_width4'] = $this->config->get('waterimage_size_width4');
        }
        if (isset($this->request->post['waterimage_size_height4'])) {
            $data['waterimage_size_height4'] = $this->request->post['waterimage_size_height4'];
        } else {
            $data['waterimage_size_height4'] = $this->config->get('waterimage_size_height4');
        }
        if (isset($this->request->post['waterimage_size_width5'])) {
            $data['waterimage_size_width5'] = $this->request->post['waterimage_size_width5'];
        } else {
            $data['waterimage_size_width5'] = $this->config->get('waterimage_size_width5');
        }
        if (isset($this->request->post['waterimage_size_height5'])) {
            $data['waterimage_size_height5'] = $this->request->post['waterimage_size_height5'];
        } else {
            $data['waterimage_size_height5'] = $this->config->get('waterimage_size_height5');
        }



        $this->load->model('tool/image');


        if (isset($this->request->post['waterimage_image']) && is_file(DIR_IMAGE . $this->request->post['waterimage_image'])) {
                $data['waterimage_image'] = $this->model_tool_image->resize($this->request->post['waterimage_image'], 100, 100);
        } elseif ($this->config->get('waterimage_image') && is_file(DIR_IMAGE . $this->config->get('waterimage_image'))) {
                $data['thumb'] = $this->model_tool_image->resize($this->config->get('waterimage_image'), 100, 100);
                $data['waterimage_image'] = $this->config->get('waterimage_image');
                
        } else {
                $data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
                $data['waterimage_image'] = '';
        }

        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

        
        if (isset($this->request->post['waterimage_pros'])) {
            $data['waterimage_pros'] = $this->request->post['waterimage_pros'];
        } elseif ($this->config->get('waterimage_pros')) {
            $data['waterimage_pros'] = $this->config->get('waterimage_pros');
        } else
            $data['waterimage_pros'] = '20';
        //KHUSUS VERSI 2000
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/waterimage.tpl', $data));

        //-------------
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/waterimage')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }


        return !$this->error;
    }

  //OpencartModules
    private function delTree ($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
             (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}

?>
