const replaceHeadTags = (target) => {
  const head = document.head;
  const targetHead = target.html.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0];
  const newPageHead = document.createElement("head");
  newPageHead.innerHTML = targetHead;
  const removeHeadTags = [
    "meta[name='keywords']",
    "meta[name='description']",
    "meta[property^='fb']",
    "meta[property^='og']",
    "meta[name^='twitter']",
    "meta[name='robots']",
    "meta[itemprop]",
    "link[itemprop]",
    "link[rel='prev']",
    "link[rel='next']",
    "link[rel='canonical']",
  ].join(",");
  const headTags = [...head.querySelectorAll(removeHeadTags)];
  headTags.forEach((item) => {
    head.removeChild(item);
  });
  const newHeadTags = [...newPageHead.querySelectorAll(removeHeadTags)];
  newHeadTags.forEach((item) => {
    head.appendChild(item);
  });
};

let pageName;
let vw = window.innerWidth;

const locomotiveScroll = new LocomotiveScroll({
  el: document.querySelector("[data-scroll-container='true']"),
  smooth: false,
  direction: "vertical",
  multiplier: 1,
  offset: ["20%", "10%"], // [x, y]
  horizontalGesture: false,
  scrollFromAnywhere: false,
  scrollbarContainer: false,
  getDirection: false,
  repeat: false,
});




//.faq-itemをクリックすると.is-openをトグルする
function faq() {
  console.log("faq()");
  const faqItems = document.querySelectorAll(".faq-item");
  faqItems.forEach((faqItem) => {
    faqItem.addEventListener("click", () => {
      //子要素の.faq-item__aを取得
      let faqItemA = faqItem.querySelector(".faq-item__a");
      //faqItemAの子要素の.bodyを取得
      let faqItemBody = faqItemA.querySelector(".body");
      //is-openを含んでいるか判定
      if (faqItem.classList.contains("is-open")) {
        faqItemA.style.height = "";
      } else {
        faqItemA.style.height = faqItemBody.clientHeight + "px";
      }

      
      faqItem.classList.toggle("is-open");
    });
  });
}




burgerInit();
function burgerInit() {
  var burgerBtn = document.getElementsByClassName("burger-btn");
  var burgerMenu = document.getElementById("header-nav");
  var header = document.getElementById("header");
  var loading = document.getElementById("loading");
  burgerBtn[0].addEventListener(
    "click",
    function () {
      burgerBtn[0].classList.toggle("is-open");
      burgerMenu.classList.toggle("is-open");
      header.classList.toggle("is-open");
      loading.classList.toggle("is-open");
    },
    false
  );

  var burgerMenuItems = document.getElementsByClassName("link-in-header");
  for (var i = 0; i < burgerMenuItems.length; i++) {
    burgerMenuItems[i].addEventListener(
      "click",
      function () {
        //.js-accordion-triggerを持っている場合は処理を行わない
        if (this.classList.contains("js-accordion-trigger")) {
          return;
        }
        console.log("burger Close");
        burgerMenu.classList.remove("is-open");
        burgerBtn[0].classList.remove("is-open");
        header.classList.remove("is-open");
        loading.classList.remove("is-open");
      },
      false
    );
  }
}

let templeGallerySlider;
//スライダーの初期化
function slider() {
  console.log("slider()");
  let templeGallery = document.getElementById("templeCreative-gallery");
  if (templeGallery) {
    templeGallerySlider = new Splide("#templeCreative-gallery .splide", {
      type: "loop",
      perPage: 10,
      autoplay: true,
      //autoplay:false,
      speed: 3000,
      rewindByDrag: true,
      arrows: false,
      pagination: false,
      drag: true,
      snap: true,
      interval: 5000,
      isNavigation: true, //スライドをクリック可能にする
      waitForTransition: false,
      focus: "center",

      breakpoints: {
        768: {
          // 横のスライドが見えてる幅 x 左右 / スライドの幅
          // 63 * 2 / 249 = 0.5
          perPage: 1.5,
          focus: "center", ///アクティブスライドを中央に表示
        },
      },
    });

    templeGallerySlider.mount();
  }
}

//リサイズを検知
window.addEventListener("resize", function () {
  setTimeout(function () {
    console.log("resize");
    let newVw = window.innerWidth;
    //console.log("vw : " + vw);
    //console.log("newVw : " + newVw);
    //vw768を跨いだ時の処理
    if (vw >= 768 && newVw < 768) {
      console.log("PC表示→SP表示");
      transition(3000);
    }
    //vw768を跨いだ時の処理
    if (vw < 768 && newVw >= 768) {
      console.log("SP表示→PC表示");
      transition(3000);
    }
  }, 100);

});



//リキッド時の調整
function fixSize() {
  //.index-list .itemの幅を丸める
  let indexList = document.getElementsByClassName("index-list");
  for (var i = 0; i < indexList.length; i++) {
    let indexListW = indexList[i].clientWidth;
    indexList[i].style.width = Math.ceil(indexListW) + "px";
    let indexListItems = indexList[i].getElementsByClassName("item");
    for (var j = 0; j < indexListItems.length; j++) {
      let indexListItem = indexListItems[j];
      let indexListItemW = indexListItem.clientWidth;
      indexListItem.style.width = Math.floor(indexListItemW) + "px";
    }
  }
}

//トランジション

function transition(time = 300) {
  console.log("transition");
  document.getElementsByTagName("body")[0].classList.remove("is-transit");
  document.getElementsByTagName("body")[0].classList.add("is-transitioning");
  setTimeout(function () {
    document
      .getElementsByTagName("body")[0]
      .classList.remove("is-transitioning");
    document.getElementsByTagName("body")[0].classList.add("is-transit");
    vw = window.innerWidth;
  }, time);
}

//.sns-btn__item のhref内の{URL}を現在のURLに置き換える
var snsBtn = document.getElementsByClassName("sns-btn__item");
var currentUrl = location.href;
for (var i = 0; i < snsBtn.length; i++) {
  var snsUrl = snsBtn[i].href;
  sns = snsUrl.replace("{URL}", currentUrl);
  snsBtn[i].href = sns;
}

function wordDivider() {
  console.log("wordDivider()");
  let wordDividers = document.getElementsByClassName("js-word-divider");
  for (var i = 0; i < wordDividers.length; i++) {
    let wordDivider = wordDividers[i];
    //1文字ずつspanで囲む
    //スペースは&nbsp;に変換
    //brタグはそのまま
    let text = wordDivider.innerHTML;
    let textArray = text.split("");
    let textArrayLength = textArray.length;
    let newText = "";
    for (var j = 0; j < textArrayLength; j++) {
      //HTMLタグの場合
      if (textArray[j] === "<") {
        let tag = textArray.slice(j, textArray.indexOf(">", j) + 1).join("");
        newText += tag;
        j = textArray.indexOf(">", j);
        continue;
      }
      if (textArray[j] === " ") {
        newText += "&nbsp;";
      } else {
        newText += "<span>" + textArray[j] + "</span>";
      }
    }
    wordDivider.innerHTML = newText;
  }

}

function setData() {
  //data-delayを持つ要素にstyle="transition-delay:{値}s"を付与
  let dataDelays = document.querySelectorAll("[data-delay]");
  for (var i = 0; i < dataDelays.length; i++) {
    let dataDelay = dataDelays[i].dataset.delay;
    dataDelays[i].style.transitionDelay = dataDelay + "s";
  }
}

function changeState(name, next) {
  console.log("【changeState : " + name + "】");
  //resetAccordion();
  //setAccordion();
  form();
  //faq();
  anchor();
  //wordDivider();
  setData();
  slider();
  //console.log(next);
  overlay();
  //new YubinBango.MicroformatDom();
  console.log("a");
  //console.log({count})
  //home以外の場合はheaderに.type-blackを付与
  if (name !== "home") {
    //bodyに.papge-subpageを付与
    document.getElementsByTagName("body")[0].classList.add("page-subpage");
  } else {
    document.getElementsByTagName("body")[0].classList.remove("page-subpage");
  }

  console.log("b");
  setTimeout(function () {
    document
      .getElementsByTagName("body")[0]
      .classList.remove("is-transitioning");
    document.getElementsByTagName("body")[0].classList.add("is-transit");
  }, 300);c
  console.log("aaaa");
}


let accordionTriggers = document.querySelectorAll(".js-accordion-trigger");
let count = 0;
function resetAccordion() {
  console.log("resetAccordion");
  // 前のaccordionをリセット
  accordionTriggers.forEach((trigger) => {
    if (trigger.listenerFunction) {
      trigger.removeEventListener("click", trigger.listenerFunction);
    }
    trigger.classList.remove("is-active");
    let target = trigger.parentElement.querySelector(".js-accordion-target");
    target.style.height = "";
  });

  // accordionTriggersの更新は必要ないかもしれませんが、
  // 念のため更新します。
  accordionTriggers = document.querySelectorAll(".js-accordion-trigger");
}

function accordionClickHandler(e) {
  console.log("click");
  let trigger = e.currentTarget;
  //triggerの親要素.js-accordionを取得
  let el = trigger.parentElement;
  //targetの子要素の.innerを取得
  let target = el.querySelector(".js-accordion-target");
  let content = el.querySelector(".js-accordion-content");
  let contentH = content.clientHeight;
  //triggerが.is-activeを持っているか判定
  if (trigger.classList.contains("is-active")) {
    //console.log("has");
    //targetの高さを0にする
    target.style.height = "";
  } else {
    //console.log("not has");
    //兄弟要素の.js-accordion-targetを取得
    //console.log(innerH);
    target.style.height = contentH + "px";
  }

  trigger.classList.toggle("is-active");

  //trigger以外の.js-accordion-triggerをリセット
  accordionTriggers.forEach((item) => {
    if (item !== trigger) {
      item.classList.remove("is-active");
      let target = item.parentElement.querySelector(".js-accordion-target");
      target.style.height = "";
    }
  });

  setTimeout(function () {
    locomotiveScroll.update();
  }, 1000);
}

function setAccordion() {
  console.log("setAccordion()");
  // .js-accordion-triggerを取得
  accordionTriggers = document.querySelectorAll(".js-accordion-trigger");
  // triggersに対して処理を行う
  accordionTriggers.forEach((trigger) => {
    // triggerをクリックした時の処理
    const clickHandler = (e) => accordionClickHandler(e);
    trigger.addEventListener("click", clickHandler);

    // clickHandlerをトリガーのプロパティとして保存
    trigger.listenerFunction = clickHandler;
  });

  //リサイズ時
  window.addEventListener("resize", () => {
    //triggersに対して処理を行う
    accordionTriggers.forEach((trigger) => {
      //triggerが.is-activeを持っているか判定
      if (trigger.classList.contains("is-active")) {
        let target = trigger.nextElementSibling;
        //targetの子要素の.innerを取得
        let inner = target.querySelector(".inner");
        let innerH = inner.clientHeight;
        //console.log(innerH);
        target.style.height = innerH + "px";
      }
    });
  });
} //setAccordion

function anchor() {
  console.log("anchor()");
  let anchor = document.querySelectorAll(".js-anchor");
  for (var i = 0; i < anchor.length; i++) {
    anchor[i].addEventListener("click", function (e) {
      e.preventDefault();
      let target = this.getAttribute("href");
      //targetの#より後ろを取得
      target = '#' + target.split("#")[1];
      console.log(target);
      let targetPosition = document.querySelector(target).offsetTop;
      targetPosition = targetPosition - 100;
      //URLを変更
      history.pushState(null, null, target);
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
      });
    });
  }

}

barba.init();
document.addEventListener("DOMContentLoaded", function () {
  console.log("DOMContentLoaded");
  overlay();
  if(templeGallerySlider){
    //ローディングアニメーションが終わったらスライダーを実行
    setTimeout(function () {
      //slider();
      templeGallerySlider.refresh();
      //console.log(templeGallerySlider);
    }, 4000);
  }

});



//スクロール位置をコンソールに表示
window.addEventListener("scroll", function () {
  this.setTimeout(function () {

    //homeの場合はKVとKV以外でヘッダーの色を変更
    if (pageName !== "home") {
      return;
    }
    //console.log(window.pageYOffset);
    let scrolled = window.pageYOffset;
    changeHeader(scrolled);
  }
  , 600);
});


function changeHeader(scrolled) {
  //homeの場合はKVとKV以外でヘッダーの色を変更
  
  //#kvの下端の位置を取得
  let kv = document.getElementById("kv");
  let kvH = kv.clientHeight;
  let kvBottom = kvH + kv.offsetTop;
  //表示領域の上端が#kvの下端より上にある場合
  if (scrolled < kvBottom) {
    document.getElementById("header").classList.remove("type-black");
  } else {
    document.getElementById("header").classList.add("type-black");
  }

}



/* --------------------

beforeEnter

-------------------- */
barba.hooks.beforeEnter(({ next }) => {
  console.log("【beforeEnter】");
  replaceHeadTags(next);
  slider();
  //console.log(next.namespace);
});

const eventDelete = (e) => {
  if (e.currentTarget.href === window.location.href) {
    console.log("eventDelete")
    e.preventDefault();
    e.stopPropagation();
    //一番上にスクロール
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
    return;
  }
};

const links = [...document.querySelectorAll("a[href]")];
links.forEach((link) => {
  link.addEventListener(
    "click",
    (e) => {
      eventDelete(e);
    },
    false
  );
});

/* --------------------

enter

-------------------- */
barba.hooks.enter(({ next }) => {
  console.log("【enter】");
  //burgerInit();
  //changeState(next.namespace, next);
});

/* --------------------

afterEnter

-------------------- */
barba.hooks.afterEnter(({ next }) => {
  console.log("【afterEnter】");

  changeState(next.namespace, next);
  pageName = next.namespace;
  //URLに#が含まれているか判定
  if (window.location.href.indexOf("#") !== -1) {
    //URLに#が含まれている場合

    //スクロール
    setTimeout(function () {
      //ハッシュを取得
      let hash = window.location.hash;
      //ハッシュの要素の位置を取得
      let hashPosition = document.querySelector(hash).offsetTop;
      hashPosition = hashPosition - 100;
      console.log("scroll");
      console.log("hashPosition : " + hashPosition);
      window.scrollTo({
        top: hashPosition,
        behavior: "smooth",
      });
    }, 300); // 秒数を指定。ミリ秒
  } else {
    //URLに#が含まれていない場合
    setTimeout(function () {
      window.scrollTo({
        top: 0,
        behavior: "instant",
      });
    }, 100); // 秒数を指定。ミリ秒
  }

});

/* --------------------

after

-------------------- */
barba.hooks.after(() => {
  console.log("【after】");
  locomotiveScroll.init();
  //ハッシュを取得
  let hash = window.location.hash;
  //ハッシュの要素の位置を取得
  let hashPosition = document.querySelector(hash).offsetTop;
  hashPosition = hashPosition - 100;
  console.log("scroll");
  console.log("hashPosition : " + hashPosition);
});

/* --------------------

beforeLeave

-------------------- */
barba.hooks.beforeLeave(({ next }) => {
  //console.log("beforeLeave");
  locomotiveScroll.destroy();
  document.getElementsByTagName("body")[0].classList.remove("is-transit");
  document.getElementsByTagName("body")[0].classList.add("is-transitioning");
});




let activeWorktype;
//.js-overlayをクリックすると#overlayに.is-activeをトグルする
function overlay() {
  console.log("overlay()");
  let overlay = document.getElementById("overlay");
  let overlayContent = document.getElementById("overlay-content");

  if (!overlay) {
    console.log("overlay is not found");
    return;
  }

  //非表示
  overlay.addEventListener("click", () => {
    overlay.classList.remove("is-active");
    let overlaySliderItem = document.querySelectorAll(".overlay-slider__item");
    overlaySliderItem.forEach((item) => {
      item.classList.remove("is-active");
      item.classList.remove("is-next");
      item.classList.remove("is-prev");
    });
  });
  overlayContent.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  //.js-overlay-closeをクリックすると#overlayの.is-activeを削除
  let overlayClose = document.querySelectorAll(".js-overlay-close");
  for (var i = 0; i < overlayClose.length; i++) {
    overlayClose[i].addEventListener("click", function () {
      overlay.classList.remove("is-active");
      let overlaySliderItem = document.querySelectorAll(
        ".overlay-slider__item"
      );
      overlaySliderItem.forEach((item) => {
        item.classList.remove("is-active");
        item.classList.remove("is-next");
        item.classList.remove("is-prev");
      });
    });
  }

  //起動 .js-overlay-activate
  let overlayActivate = document.querySelectorAll(".js-overlay-activate");
  for (var i = 0; i < overlayActivate.length; i++) {
    overlayActivate[i].addEventListener("click", function () {
      console.log("activate");
      overlay.classList.add("is-active");
      //クリックした要素のdata-worktypeを取得
      let workType = this.getAttribute("data-worktype");
      activeWorktype = workType;
      console.log({ activeWorktype });
      //workTypeと一致する.overlay-slider__itemを取得
      let overlaySliderItem = document.querySelectorAll(
        ".overlay-slider__item"
      );
      console.log(overlaySliderItem);
      overlaySliderItem.forEach((item) => {
        //itemのdata-worktypeを取得
        let itemWorkType = item.getAttribute("data-worktype");
        //workTypeと一致するitemを表示
        if (workType === itemWorkType) {
          item.classList.add("is-active");
        }
      });
      overlaySliderItem.forEach((item) => {
        item.classList.remove("is-next");
        item.classList.remove("is-prev");
      });

      let prev;
      let next;
      if (activeWorktype == 0) {
        //1番目の場合
        prev = overlaySliderItem.length - 1;
        next = Number(activeWorktype) + 1;
      } else if (activeWorktype == overlaySliderItem.length - 1) {
        //最後の場合
        prev = Number(activeWorktype) - 1;
        next = 0;
      } else {
        prev = Number(activeWorktype) - 1;
        next = Number(activeWorktype) + 1;
      }
      console.log({ prev });
      console.log({ next });
      overlaySliderItem[prev].classList.add("is-prev");
      overlaySliderItem[next].classList.add("is-next");
    });
  }

  //-ナビゲーション
  let overlaySliderItem = document.querySelectorAll(".overlay-slider__item");
  let overlayPrev = document.querySelectorAll(".js-overlay-prev");
  let overlayNext = document.querySelectorAll(".js-overlay-next");
  for (var i = 0; i < overlayPrev.length; i++) {
    overlayPrev[i].addEventListener("click", function () {
      console.log("prev");
      let overlaySliderItem = document.querySelectorAll(
        ".overlay-slider__item"
      );
      overlaySliderItem.forEach((item) => {
        item.classList.remove("is-active");
        item.classList.remove("is-next");
        item.classList.remove("is-prev");
      });
      activeWorktype--;
      if (activeWorktype < 0) {
        activeWorktype = overlaySliderItem.length - 1;
      }
      overlaySliderItem[activeWorktype].classList.add("is-active");
      if (activeWorktype !== 0) {
        overlaySliderItem[activeWorktype - 1].classList.add("is-prev");
      } else {
        overlaySliderItem[overlaySliderItem.length - 1].classList.add(
          "is-prev"
        );
      }

      if (activeWorktype !== overlaySliderItem.length - 1) {
        overlaySliderItem[activeWorktype + 1].classList.add("is-next");
      } else {
        overlaySliderItem[0].classList.add("is-next");
      }
    });
  }

  for (var i = 0; i < overlayNext.length; i++) {
    overlayNext[i].addEventListener("click", function () {
      console.log("next");
      let overlaySliderItem = document.querySelectorAll(
        ".overlay-slider__item"
      );
      overlaySliderItem.forEach((item) => {
        item.classList.remove("is-active");
        item.classList.remove("is-next");
        item.classList.remove("is-prev");
      });
      activeWorktype++;
      if (activeWorktype > overlaySliderItem.length - 1) {
        activeWorktype = 0;
      }
      overlaySliderItem[activeWorktype].classList.add("is-active");
      if (activeWorktype !== overlaySliderItem.length - 1) {
        overlaySliderItem[activeWorktype + 1].classList.add("is-next");
      } else {
        overlaySliderItem[0].classList.add("is-next");
      }
      if (activeWorktype !== 0) {
        overlaySliderItem[activeWorktype - 1].classList.add("is-prev");
      } else {
        overlaySliderItem[overlaySliderItem.length - 1].classList.add(
          "is-prev"
        );
      }
    });
  }

  console.log("overlay end");
}
