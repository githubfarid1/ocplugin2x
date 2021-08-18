<?php

class ControllerExtensionModuleBulkimage extends Controller {

    private $error = array();
    public function index() {
        $this->language->load('extension/module/bulkimage');

        $this->load->model('setting/setting');

        $this->document->setTitle($this->language->get('heading_title'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('bulkimage', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'));


        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['entry_creator'] = $this->language->get('entry_creator');
        $data['entry_version'] = $this->language->get('entry_version');
        $data['entry_updated'] = $this->language->get('entry_updated');
        $data['entry_licence'] = $this->language->get('entry_licence');


        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $data['entry_enable'] = $this->language->get('entry_enable');
        $data['entry_enable_desc'] = $this->language->get('entry_enable_desc');
        $data['entry_limit'] = $this->language->get('entry_limit');
        $data['entry_limit_desc'] = $this->language->get('entry_limit_desc');

        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');
        $data['text_default'] = $this->language->get('text_default');


        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['client_id'])) {
            $data['error_client_id'] = $this->error['client_id'];
        } else {
            $data['error_client_id'] = '';
        }

        if (isset($this->error['secret'])) {
            $data['error_secret'] = $this->error['secret'];
        } else {
            $data['error_secret'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        if (!isset($this->request->get['module_id'])) {
    			$data['breadcrumbs'][] = array(
    				'text' => $this->language->get('heading_title'),
    				'href' => $this->url->link('extension/module/bulkimage', 'token=' . $this->session->data['token'], true)
    			);
    		} else {
    			$data['breadcrumbs'][] = array(
    				'text' => $this->language->get('heading_title'),
    				'href' => $this->url->link('extension/module/bulkimage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true)
    			);
    		}

        if (!isset($this->request->get['module_id'])) {
    			$data['action'] = $this->url->link('extension/module/bulkimage', 'token=' . $this->session->data['token'], true);
    		} else {
    			$data['action'] = $this->url->link('extension/module/bulkimage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], true);
    		}

    		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
    			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
    		}


        //$data['modules'] = array();

        if (isset($this->request->post['bulkimage_status'])) {
            $data['bulkimage_status'] = $this->request->post['bulkimage_status'];
        } else {
            $data['bulkimage_status'] = $this->config->get('bulkimage_status');
        }

        if (isset($this->request->post['bulkimage_limit'])) {
            $data['bulkimage_limit'] = $this->request->post['bulkimage_limit'];
        } elseif ($this->config->get('bulkimage_limit')) {
            $data['bulkimage_limit'] = $this->config->get('bulkimage_limit');
        } else {
            $data['bulkimage_limit'] = '50';
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/bulkimage.tpl', $data));
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/bulkimage')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        return !$this->error;
    }

}

?>
