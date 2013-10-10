<?php 

  class Comments extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('post_model', 'post');
      $this->load->model('screencast_model', 'screencast');
      $this->load->model('comment_model', 'comment');

      $this->_determine_route();
      $this->_signed_in_filter();
    }

    public function create() {
      $comment = $this->input->post();
      if ($this->_user_logged_in()) {
        $comment['commentor_id'] = $this->session->userdata('user_id');
      }
      $this->comment->create($comment);
      if ($comment['commentable_type'] == 'posts') {
        $object = $this->post->find($comment['commentable_id']);
      } else if ($comment['commentable_type'] == 'screencasts') {
        $object = $this->screencast->find($comment['commentable_id']);
      }
      redirect($comment['commentable_type'] . '/show/' . $object['slug']);
    }

    public function destroy($id) {
      $comment = $this->comment->find($id);
      $commentable = $this->comment->get_commentable($comment);
      $user_id = $this->session->userdata('user_id');
      if ($comment['commentor_id'] == $user_id || $commentable['user_id'] == $user_id) {
        $this->comment->destroy(array('id' => $id));
        $this->session->set_flashdata('notice', 'Comment deleted.');
      } else {
        $this->session->set_flashdata('error', 'You cannot delete other users\' comment.');
      }
      redirect($comment['commentable_type'] . '/show/' . $commentable['slug']);
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'pages';
      $this->route['action_name'] = ($action) ? $action : 'about';
      $this->load->vars($this->route);
    }

    private function _signed_in_filter() {
      $actions = array('destroy');
      if (in_array($this->route['action_name'], $actions) && !$this->_user_logged_in()) {
        $this->session->set_flashdata('error', 'You must be logged in to view the page.');
        redirect('sessions/make');
      }
    }

    private function _user_logged_in() {
      return !!$this->session->userdata('user_id');
    }

  }