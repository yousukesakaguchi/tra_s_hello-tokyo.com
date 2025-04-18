// GSAPの初期化
gsap.registerPlugin(ScrollTrigger);

// テキストを1文字ずつspanで囲む関数
const splitText = (element) => {
  const text = element.textContent;
  element.textContent = '';
  [...text].forEach(char => {
    const span = document.createElement('span');
    span.textContent = char;
    span.style.display = 'inline-block';
    element.appendChild(span);
  });
};

// スクロールアニメーション
document.addEventListener('DOMContentLoaded', () => {
  // .is-anim-secを持つ要素を取得
  const animSections = document.querySelectorAll('.is-anim-sec');

  // 各セクションに対してScrollTriggerを設定
  animSections.forEach(section => {
    ScrollTrigger.create({
      trigger: section,
      start: 'top 80%', // セクションの上端が画面の80%の位置に来たら開始
      onEnter: () => {
        section.classList.add('is-inview');
      },
      onLeaveBack: () => {
        section.classList.remove('is-inview');
      }
    });
  });

  // #introセクションのアニメーション設定
  const introSection = document.querySelector('#intro');
  if (introSection) {
    // 英語テキストの分割
    const enText = introSection.querySelector('.en.barlow');
    if (enText) splitText(enText);

    // アニメーションの設定
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: introSection,
        start: 'top 80%',
      }
    });

    // 英語テキストの1文字ずつのアニメーション
    if (enText) {
      tl.from(enText.querySelectorAll('span'), {
        y: 50,
        opacity: 0,
        duration: 0.5,
        stagger: 0.05,
        ease: 'power2.out'
      });
    }

    // leadのアニメーション
    const leads = introSection.querySelectorAll('.lead');
    leads.forEach((lead, index) => {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.8,
        delay: index * 0.2,
        ease: 'power2.out'
      }, '-=0.4');
    });

    // テキストのアニメーション
    const texts = introSection.querySelectorAll('.text');
    texts.forEach((text, index) => {
      tl.from(text, {
        y: 30,
        opacity: 0,
        duration: 0.8,
        delay: index * 0.2,
        ease: 'power2.out'
      }, '-=0.4');
    });
  }

  // benefitセクションのアニメーション設定
  const benefitSections = document.querySelectorAll('.benefit');
  benefitSections.forEach(section => {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: 'top 80%',
      }
    });

    // ラベルのアニメーション
    const label = section.querySelector('.benefit_label');
    if (label) {
      tl.from(label, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      });
    }

    // 画像のアニメーション
    const img = section.querySelector('.benefit_img');
    if (img) {
      tl.from(img, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      }, '-=0.2');
    }

    // リード文のアニメーション
    const lead = section.querySelector('.benefit_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }

    // 本文のアニメーション
    const body = section.querySelector('.benefit_body');
    if (body) {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }

    // ボタンのアニメーション
    const btn = section.querySelector('.benefit_btn');
    if (btn) {
      tl.from(btn, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }
  });

  // conceptセクションのアニメーション設定
  const conceptSection = document.querySelector('#concept');
  if (conceptSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: conceptSection,
        start: 'top 80%',
      }
    });

    // タイトル1のアニメーション
    const title1 = conceptSection.querySelector('.title-1');
    if (title1) {
      tl.from(title1, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      });
    }

    // タイトル2のアニメーション
    const title2 = conceptSection.querySelector('.title-2');
    if (title2) {
      tl.from(title2, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // タイトル3のアニメーション
    const title3 = conceptSection.querySelector('.title-3');
    if (title3) {
      tl.from(title3, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // 本文のアニメーション
    const body = conceptSection.querySelector('.concept_body');
    if (body) {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // recruit_itemのアニメーション設定
  const recruitItems = document.querySelectorAll('.recruit_item');
  recruitItems.forEach(item => {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: item,
        start: 'top 80%',
      }
    });

    // アイコンのアニメーション
    const icon = item.querySelector('.recruit_icon');
    if (icon) {
      tl.from(icon, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      });
    }

    // タイトルのアニメーション
    const title = item.querySelector('.recruit_title');
    if (title) {
      tl.from(title, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }

    // 本文のアニメーション
    const body = item.querySelector('.recruit_body');
    if (body) {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }

    // ボタンのアニメーション
    const btn = item.querySelector('.recruit_btn');
    if (btn) {
      tl.from(btn, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }
  });

  // voiceセクションのアニメーション設定
  const voiceSection = document.querySelector('#voice');
  if (voiceSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: voiceSection,
        start: 'top 80%',
      }
    });

    // タイトルのアニメーション
    const title = voiceSection.querySelector('.voice_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      });
    }

    // リード文のアニメーション
    const lead = voiceSection.querySelector('.voice_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // 本文のアニメーション
    const body = voiceSection.querySelector('.voice_body');
    if (body) {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // ボタンのアニメーション
    const btn = voiceSection.querySelector('.voice_btn');
    if (btn) {
      tl.from(btn, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // top_informationセクションのアニメーション設定
  const topInfoSection = document.querySelector('#top_information');
  if (topInfoSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: topInfoSection,
        start: 'top 80%',
      }
    });

    // タイトルのアニメーション
    const title = topInfoSection.querySelector('.top_information_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      });
    }

    // ニュースアイテムのアニメーション
    const items = topInfoSection.querySelectorAll('.top_information_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        delay: index * 0.2,
        ease: 'power2.out'
      }, '-=0.2');
    });

    // ボタンのアニメーション
    const btn = topInfoSection.querySelector('.btn_area');
    if (btn) {
      tl.from(btn, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.2');
    }
  }

  // welfare_kvセクションのアニメーション設定
  const welfareKvSection = document.querySelector('#welfare_kv');
  if (welfareKvSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: welfareKvSection,
        start: 'top 80%',
        delay: 1
      }
    });

    // タイトルのアニメーション
    const title = welfareKvSection.querySelector('.welfare__title');
    if (title) {
      // 英語テキストの分割
      const enText = title.querySelector('.en.barlow');
      if (enText) splitText(enText);

      // 日本語タイトルのアニメーション
      const jaText = title.querySelector('.ja');
      if (jaText) {
        tl.from(jaText, {
          y: 50,
          opacity: 0,
          duration: 0.8,
          ease: 'power2.out',
          delay: 0.8
        });
      }

      // 英語テキストの1文字ずつのアニメーション
      if (enText) {
        tl.from(enText.querySelectorAll('span'), {
          y: 20,
          opacity: 0,
          duration: 0.5,
          stagger: 0.05,
          ease: 'power2.out',
          delay: 0.5
        }, '-=0.8');
      }
    }

    // 画像のアニメーション
    const img = welfareKvSection.querySelector('.welfare_kv__img');
    if (img) {
      tl.from(img, {
        filter: 'blur(10px)',
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // infographicセクションのアニメーション設定
  const infographicSection = document.querySelector('#infographic');
  if (infographicSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: infographicSection,
        start: 'top 80%',
      }
    });

    // タイトルのアニメーション
    const title = infographicSection.querySelector('.content_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      });
    }

    // インフォグラフィックアイテムのアニメーション
    const items = infographicSection.querySelectorAll('.info_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.2');
    });
  }

  // trainingセクションのアニメーション設定
  const trainingSection = document.querySelector('#training');
  if (trainingSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: trainingSection,
        start: 'top 80%',
      }
    });

    // タイトルのアニメーション
    const title = trainingSection.querySelector('.content_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      });
    }

    // サブタイトルのアニメーション
    const subtitle = trainingSection.querySelector('.content_subtitle');
    if (subtitle) {
      tl.from(subtitle, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // テキストのアニメーション
    const text = trainingSection.querySelector('.training_section_text');
    if (text) {
      tl.from(text, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // フロー見出しのアニメーション
    const flowHead = trainingSection.querySelector('.training_section_flow_head');
    if (flowHead) {
      tl.from(flowHead, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // フローステップのアニメーション
    const flowSteps = trainingSection.querySelectorAll('.training_section_flow_step');
    flowSteps.forEach((step, index) => {
      tl.from(step, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.2');
    });
  }

  // benefitセクションのアニメーション設定（福利厚生ページ）
  const welfareBenefitSection = document.querySelector('#benefit');
  if (welfareBenefitSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: welfareBenefitSection,
        start: 'top 80%',
      }
    });

    // タイトルのアニメーション
    const title = welfareBenefitSection.querySelector('.content_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      });
    }

    // アイテムのアニメーション
    const items = welfareBenefitSection.querySelectorAll('.icon_card_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.2');
    });
  }
});
