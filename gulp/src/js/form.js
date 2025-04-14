function form() {
  var entryEl = document.getElementById("form");
  if (!entryEl) {
    return;
  }
  var confirmBtn = document.querySelectorAll(".btn-confirm");
  var backBtn = document.querySelectorAll(".btn-back");
  var submitBtn = document.querySelectorAll(".btn-submit");

  var entryElOffsetTop = entryEl.offsetTop;
  //#headerの高さを取得
  var headerHeight = document.getElementById("header").clientHeight;
  //entryElOffsetTopからheaderHeightを引いた値をentryElOffsetTopに代入
  entryElOffsetTop = entryElOffsetTop - headerHeight;

  for (var i = 0; i < confirmBtn.length; i++) {
    confirmBtn[i].addEventListener("click", function () {
      //confirmBtn.addEventListener("click", function() {

      var entryEl = document.getElementById("form");
      var entryElOffsetTop = entryEl.offsetTop;
      //#headerの高さを取得
      var headerHeight = document.getElementById("header").clientHeight;
      //entryElOffsetTopからheaderHeightを引いた値をentryElOffsetTopに代入
      entryElOffsetTop = entryElOffsetTop - headerHeight;
      //entryOffsetTopにスムーススクロール
      window.scrollTo({
        top: entryElOffsetTop,
        behavior: "smooth",
      });
      //自分の祖先要素の中から.form-itemを探す
      var parent = this.closest(".form-item");
      var root = this.closest("#contact");
      //validate(parent);
      var error = validate(parent);
      if (error !== 0) {
        return false;
      }
      parent.classList.add("is-step-2");
      parent.classList.remove("is-step-1");
      root.classList.add("is-step-2");
      root.classList.remove("is-step-1");
      entryEl.classList.add("is-step-2");
      entryEl.classList.remove("is-step-1");

      const textareaEls = document.querySelectorAll("textarea");

      textareaEls.forEach((textareaEl) => {
        // デフォルト値としてスタイル属性を付与
        textareaEl.removeAttribute("style");
      });
    });
  }

  for (var i = 0; i < backBtn.length; i++) {
    backBtn[i].addEventListener("click", function () {
      //backBtn.addEventListener("click", function () {
      var parent = this.closest(".form-item");
      var root = this.closest("#contact");
      parent.classList.add("is-step-1");
      parent.classList.remove("is-step-2");
      root.classList.add("is-step-1");
      root.classList.remove("is-step-2");
      var entryEl = document.getElementById("form");
      entryEl.classList.remove("is-step-2");
      entryEl.classList.add("is-step-1");
      var entryElOffsetTop = entryEl.offsetTop;
      //#headerの高さを取得
      var headerHeight = document.getElementById("header").clientHeight;
      //entryElOffsetTopからheaderHeightを引いた値をentryElOffsetTopに代入
      entryElOffsetTop = entryElOffsetTop - headerHeight;
      //entryOffsetTopにスムーススクロール
      window.scrollTo({
        top: entryElOffsetTop,
        behavior: "smooth",
      });
    });
  }

  for (var i = 0; i < submitBtn.length; i++) {
    submitBtn[i].addEventListener("click", function () {
      //submitBtn.addEventListener("click", function () {
      //console.log("submitBtn");
      var parent = this.closest(".form-item");
      var root = this.closest("#contact");
      var error = validate(parent);
      if (error !== 0) {
        return false;
      }
      parent.classList.add("is-step-3");
      parent.classList.remove("is-step-2");
      root.classList.add("is-step-3");
      root.classList.remove("is-step-2");
      var entryEl = document.getElementById("form");
      entryEl.classList.remove("is-step-2");
      entryEl.classList.add("is-step-3");
      var entryElOffsetTop = entryEl.offsetTop;
      //#headerの高さを取得
      var headerHeight = document.getElementById("header").clientHeight;
      //entryElOffsetTopからheaderHeightを引いた値をentryElOffsetTopに代入
      entryElOffsetTop = entryElOffsetTop - headerHeight;
      //entryOffsetTopにスムーススクロール
      window.scrollTo({
        top: entryElOffsetTop,
        behavior: "smooth",
      });

      //validateError = false;
      console.log("sendMail");
      //ドメインがhttps://offits-work.com/の場合は、/wp-content/themes/offits/mail.phpに送信
      //それ以外の場合は、/wp/wp-content/themes/offits/mail.phpに送信
      // TODO
      var domain = location.hostname;
      var url;
      if (domain === "saji-dc.com") {
        url = "/wp/wp-content/themes/sdc/mail.php";
      } else {
        url = "/wp-content/themes/sdc/mail.php";
      }

      var params = new URLSearchParams();

      // parentはフォームのコンテナー要素です
      var inputs = parent.querySelectorAll("input, textarea");

      var formType;

      inputs.forEach(function (input) {
        // インプットの名前と値を取得
        var name = input.name;
        var value = input.value;

        // 特定のフィールドに特別な処理が必要な場合は、ここで行う
        // 例: if (name === '特定のフィールド名') { ... }

        //ラジオボタンの場合は、チェックされているものだけを送信
        if (input.type === "radio") {
          if (input.checked) {
            params.append(name, value);
          }
        } else {
          // URLSearchParamsオブジェクトにフィールドを追加
          if (name) {
            params.append(name, value);
          }

          if (name === "formType") {
            formType = value;
          }
        }
      });

      // ここで非同期のPOSTリクエストを送信
      const res = axios.post(url, params);

      res.then(function (response) {
        console.log({ response });
        if (response.status == 200) {
          //bodyにcompleteクラスを追加
          document.querySelector("body").classList.add("complete");
          document.querySelector("body").classList.remove("confirm");
          var entryEl = document.getElementById("form");
          var entryElOffsetTop = entryEl.offsetTop;
          //#headerの高さを取得
          var headerHeight = document.getElementById("header").clientHeight;
          //entryElOffsetTopからheaderHeightを引いた値をentryElOffsetTopに代入
          entryElOffsetTop = entryElOffsetTop - headerHeight;
          //entryOffsetTopにスムーススクロール
          window.scrollTo({
            top: entryElOffsetTop,
            behavior: "smooth",
          });
        }
      });
    });
  }

  function validate(parent) {
    //parentの中から.requiredItemを探す
    //console.log({parent});
    var requiredItem = parent.querySelectorAll(".requiredItem");

    var error = 0;
    //console.log({requiredItem});
    for (var i = 0; i < requiredItem.length; i++) {
      var requiredItemValue = requiredItem[i].value;
      if (requiredItemValue == "") {
        requiredItem[i].classList.add("error");
        error++;
      } else {
        requiredItem[i].classList.remove("error");
      }

      //ラジオボタンのチェック
      if (requiredItem[i].type == "radio") {
        var radioName = requiredItem[i].name;
        var radioEl = parent.querySelectorAll(`input[name=${radioName}]`);
        var radioChecked = false;
        for (var j = 0; j < radioEl.length; j++) {
          if (radioEl[j].checked) {
            radioChecked = true;
          }
        }
        if (!radioChecked) {
          error++;
          requiredItem[i].classList.add("error");
        } else {
          requiredItem[i].classList.remove("error");
        }
      }

      //チェックボックスのチェック
      if (requiredItem[i].type == "checkbox") {
        var checkboxName = requiredItem[i].name;
        var checkboxEl = parent.querySelectorAll(`input[name=${checkboxName}]`);
        var checkboxChecked = false;
        for (var j = 0; j < checkboxEl.length; j++) {
          if (checkboxEl[j].checked) {
            checkboxChecked = true;
          }
        }
        if (!checkboxChecked) {
          error++;
          requiredItem[i].classList.add("error");
        } else {
          requiredItem[i].classList.remove("error");
        }
      }

      //セレクトボックスのチェック
      console.log(requiredItem[i].tagName);
      if (requiredItem[i].tagName == "SELECT") {
        var selectValue = requiredItem[i].value;
        console.log({ selectValue });
        if (selectValue == "") {
          error++;
          requiredItem[i].classList.add("error");
        } else {
          requiredItem[i].classList.remove("error");
        }
      }
    }

    //電話番号のチェック
    var tel = parent.querySelectorAll("input[type=tel]");
    for (var i = 0; i < tel.length; i++) {
      var telValue = tel[i].value;
      if (telValue !== "") {
        //var reg = new RegExp("^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$");
        //ハイフンがあれば削除
        telValue = telValue.replace(/-/g, "");
        //inputの値を更新
        tel[i].value = telValue;
        var reg = new RegExp("^[0-9]{3,4}$");
        if (!reg.test(telValue)) {
          tel[i].classList.add("error");
          error++;
        } else {
          tel[i].classList.remove("error");
        }
      }
    }

    //メールアドレスのチェック
    //name=emailとname=emailConfirmがメールアドレスとして正しいかどうか、かつ同じかどうかをチェック
    var email = parent.querySelectorAll("input[name=email]");
    var emailConfirm = parent.querySelectorAll("input[name=emailConfirm]");
    var emailValue = email[0].value;
    var emailConfirmValue = emailConfirm[0].value;
    if (emailValue !== emailConfirmValue) {
      email[0].classList.add("error");
      emailConfirm[0].classList.add("error");
      error++;
    } else if (emailValue == "" && emailConfirmValue == "") {
      email[0].classList.add("error");
      emailConfirm[0].classList.add("error");
      error++;
    } else if (emailValue !== "" && emailConfirmValue !== "") {
      var reg = new RegExp(
        "^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\\.[a-zA-Z0-9._-]+$"
      );
      if (!reg.test(emailValue)) {
        email[0].classList.add("error");
        emailConfirm[0].classList.add("error");
        error++;
      }
    } else {
      email[0].classList.remove("error");
      emailConfirm[0].classList.remove("error");
    }

    return error;
  }


}









//ドメインにlocalhostかtestsiteが含まれる場合

const domain = location.hostname;
if (domain.indexOf("localhost") !== -1 && document.getElementById("contact")) {

  document.addEventListener("DOMContentLoaded", function () {
    let url = new URL(window.location.href);
    //ハッシュがある場合があるので、url.hrefに文字列として"sendCheck="on"があるかどうかをチェック
    let sendCheck = url.href.indexOf("sendCheck=%22on%22");
    sendCheck = 1;
    if (sendCheck !== -1) {
      console.log("sendCheck");
      //チェックボックスは
      //複数選択の時があるので
      //グループごとに配列にして
      //各グループの1つ目をチェック
      let checkGr = document.querySelectorAll(".validate-check-gr");
      console.log({ checkGr });
      let grArray = [];
      for (let i = 0; i < checkGr.length; i++) {
        let checkGrName = checkGr[i].getAttribute("name");
        //grArrayにcheckGrNameがない場合は、checkGrNameを追加
        if (grArray.indexOf(checkGrName) === -1) {
          grArray.push(checkGrName);
        }
      }
      console.log({ grArray });
      for (let i = 0; i < grArray.length; i++) {
        let checkGrEl = document.querySelectorAll(
          `.validate-check-gr[name=${grArray[i]}]`
        );
        checkGrEl[0].checked = true;
      }

      //familyName 送信
      let familyName = document.querySelector("input[name=familyName]");
      familyName.value = "送信";
      //firstName テスト
      let firstName = document.querySelector("input[name=firstName]");
      firstName.value = "テスト";
      //tel1 090
      let tel1 = document.querySelector("input[name=tel1]");
      tel1.value = "090";
      //tel2 1234
      let tel2 = document.querySelector("input[name=tel2]");
      tel2.value = "1234";
      //tel3 5678
      let tel3 = document.querySelector("input[name=tel3]");
      tel3.value = "5678";
      //email candlechant@icloud.com
      let email = document.querySelector("input[name=email]");
      email.value = "candlechant@icloud.com";
      let emailConfirm = document.querySelector("input[name=emailConfirm]");
      emailConfirm.value = "candlechant@icloud.com";
      //freemessage location.href からの送信
      let freemessage = document.querySelector("textarea[name=message]");
      freemessage.value = location.href + " からの送信";

      console.log("confirmBtn");
      var entryEl = document.getElementById("contact");
      var entryElOffsetTop = entryEl.offsetTop;
      //#headerの高さを取得
      var headerHeight = document.getElementById("header").clientHeight;
      //entryElOffsetTopからheaderHeightを引いた値をentryElOffsetTopに代入
      entryElOffsetTop = entryElOffsetTop - headerHeight;
      //entryOffsetTopにスムーススクロール
      window.scrollTo({
        top: entryElOffsetTop,
        behavior: "smooth",
      });


    }
  });
}

