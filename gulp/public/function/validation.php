<?php
  // function validation_rule($validation, $data, $Data) {
  //   if ( $data['紹介区分'] == 'ご紹介する方' ) {
  //     $validation->set_rule('ご紹介先のお名前', 'noempty', array('message' => '※ご紹介先の名前を入力してください'));
  //     $validation->set_rule('あなたについて', 'required', array('message' => '※選択してください'));
  //   }
  //   if ( $data['紹介区分'] == 'ご紹介を受けた方' ) {
  //     $validation->set_rule('ご紹介元のお名前', 'noempty', array('message' => '※ご紹介元のお名前を入力してください'));
  //   }
  //   return $validation;
  // }
  // add_filter('mwform_validation_mw-wp-form-3352', 'validation_rule', 10, 3);


  function validation_rule02($validation, $data, $Data) {
    $validation->set_rule('項目', 'required', array('message' => '※選択してください'));
    $validation->set_rule('折り返し方法', 'required', array('message' => '※選択してください'));
    $validation->set_rule('氏名', 'noempty', array('message' => '※氏名を入力してください'));
    $validation->set_rule('フリガナ', 'noempty', array('message' => '※フリガナを入力してください'));
    $validation->set_rule('電話番号', 'noempty', array('message' => '※電話番号を入力してください'));
    $validation->set_rule('メールアドレス', 'noempty', array('message' => '※メールアドレスを入力してください'));
    return $validation;
  }
  add_filter('mwform_validation_mw-wp-form-33', 'validation_rule02', 10, 3);


?>
