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
      start: 'top 50%', // セクションの上端が画面の80%の位置に来たら開始
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
        start: 'top 50%',
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
        duration: 0.6,
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
        duration: 0.6,
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
        start: 'top 50%',
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
        duration: 0.6,
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
        start: 'top 50%',
      }
    });

    // タイトル1のアニメーション
    const title1 = conceptSection.querySelector('.title-1');
    if (title1) {
      tl.from(title1, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // タイトル2のアニメーション
    const title2 = conceptSection.querySelector('.title-2');
    if (title2) {
      tl.from(title2, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // タイトル3のアニメーション
    const title3 = conceptSection.querySelector('.title-3');
    if (title3) {
      tl.from(title3, {
        y: 50,
        opacity: 0,
        duration: 0.6,
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
    // 初期状態の設定
    const btn = item.querySelector('.recruit_btn');
    if (btn) {
      gsap.set(btn, {
        y: 30,
        opacity: 0
      });
    }

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: item,
        start: 'top 80%',
        toggleActions: 'play none none reverse'
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
    if (btn) {
      tl.to(btn, {
        y: 0,
        opacity: 1,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.6');
    }
  });

  // voiceセクションのアニメーション設定
  const voiceSection = document.querySelector('#voice');
  if (voiceSection) {
    // 初期状態の設定
    const btn = voiceSection.querySelector('.voice_btn');
    if (btn) {
      gsap.set(btn, {
        y: 30,
        opacity: 0
      });
    }

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: voiceSection,
        start: 'top 80%',
        toggleActions: 'play none none reverse'
      }
    });

    // タイトルのアニメーション
    const title = voiceSection.querySelector('.voice_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
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
    if (btn) {
      tl.to(btn, {
        y: 0,
        opacity: 1,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.6');
    }
  }

  // top_informationセクションのアニメーション設定
  const topInfoSection = document.querySelector('#top_information');
  if (topInfoSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: topInfoSection,
        start: 'top 50%',
      }
    });

    // タイトルのアニメーション
    const title = topInfoSection.querySelector('.top_information_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.4,
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
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.4');
    });

    // ボタンのアニメーション
    const btn = topInfoSection.querySelector('.btn_area');
    if (btn) {
      tl.from(btn, {
        y: 30,
        opacity: 0,
        duration: 0.4,
        ease: 'power2.out'
      }, '-=0.6');
    }
  }

  // welfare_kvセクションのアニメーション設定
  const welfareKvSection = document.querySelector('#welfare_kv');
  if (welfareKvSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: welfareKvSection,
        start: 'top 50%',
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
          duration: 0.3,
          ease: 'power2.out',
          delay: 0.6
        });
      }

      // 英語テキストの1文字ずつのアニメーション
      if (enText) {
        tl.from(enText.querySelectorAll('span'), {
          y: 20,
          opacity: 0,
          duration: 0.3,
          stagger: 0.05,
          ease: 'power2.out',
        }, '-=1.0');
      }
    }

    // 画像のアニメーション
    const img = welfareKvSection.querySelector('.welfare_kv__img');
    if (img) {
      tl.from(img, {
        filter: 'blur(10px)',
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.4');
    }
  }

  // infographicセクションのアニメーション設定
  const infographicSection = document.querySelector('#infographic');
  if (infographicSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: infographicSection,
        start: 'top 50%'
      }
    });

    // タイトルのアニメーション
    const title = infographicSection.querySelector('.content_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // インフォグラフィックアイテムのアニメーション
    const items = infographicSection.querySelectorAll('.info_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.3,
        delay: index * 0.05,
        ease: 'power2.out'
      }, '-=0.4');
    });
  }

  // trainingセクションのアニメーション設定
  const trainingSection = document.querySelector('#training');
  if (trainingSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: trainingSection,
        start: 'top 50%',
      }
    });

    // タイトルのアニメーション
    const title = trainingSection.querySelector('.content_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
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
        start: 'top 50%',
      }
    });

    // タイトルのアニメーション
    const title = welfareBenefitSection.querySelector('.content_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // アイテムのアニメーション
    const items = welfareBenefitSection.querySelectorAll('.icon_card_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.3,
        delay: index * 0.05,
        ease: 'power2.out'
      }, '-=0.6');
    });
  }

  // employee-kvセクションのアニメーション設定
  const employeeKvSection = document.querySelector('#employee-kv');
  if (employeeKvSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeKvSection,
        start: 'top 50%',
        delay: 0.8
      }
    });

    // タイトル1のアニメーション
    const title1 = employeeKvSection.querySelector('#employee-kv_title-1');
    if (title1) {
      tl.from(title1, {
        y: 50,
        scale: 1.5,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
        delay: 1.5
      }, '-=0.3');
    }

    // クロスのアニメーション
    const cross = employeeKvSection.querySelector('.kv-cross img');
    if (cross) {
      tl.from(cross, {
        scale: 0.8,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
      }, '-=0.3');
    }

    // タイトル2のアニメーション
    const title2 = employeeKvSection.querySelector('#employee-kv_title-2');
    if (title2) {
      tl.from(title2, {
        y: 50,
        scale: 1.5,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
      }, '-=0.3');
    }

    // タイトルラベルのアニメーション
    const label = employeeKvSection.querySelector('.employee-kv_title-label');
    if (label) {
      tl.from(label, {
        y: 30,
        scale: 3,
        opacity: 0,
        duration: 1,
        ease: 'power2.out',
      });
    }

    // タイトルテキストのアニメーション
    const text = employeeKvSection.querySelector('.employee-kv_title-text');
    if (text) {
      tl.from(text, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
      }, '-=0.3');
    }
  }

  // employee_introセクションのアニメーション設定
  const employeeIntroSection = document.querySelector('#employee_intro');
  if (employeeIntroSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeIntroSection,
        start: 'top 80%'
      }
    });

    // リード文のアニメーション
    const lead = employeeIntroSection.querySelector('.employee_intro_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // 画像のアニメーション
    const img = employeeIntroSection.querySelector('.employee_intro_img');
    if (img) {
      tl.from(img, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // 本文のアニメーション
    const bodies = employeeIntroSection.querySelectorAll('.employee_intro_body');
    bodies.forEach((body, index) => {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // employee_highclassセクションのアニメーション設定
  const employeeHighclassSection = document.querySelector('#employee_highclass');
  if (employeeHighclassSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeHighclassSection,
        start: 'top 80%'
      }
    });

    // タイトルのアニメーション
    const title = employeeHighclassSection.querySelector('.employee_highclass_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // 画像のアニメーション
    const img = employeeHighclassSection.querySelector('.employee_highclass_img');
    if (img) {
      tl.from(img, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // テキストのアニメーション
    const lead = employeeHighclassSection.querySelector('.employee_highclass_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    const bodies = employeeHighclassSection.querySelectorAll('.employee_highclass_body');
    bodies.forEach((body, index) => {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // employee_highsalaryセクションのアニメーション設定
  const employeeHighsalarySection = document.querySelector('#employee_highsalary');
  if (employeeHighsalarySection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeHighsalarySection,
        start: 'top 80%'
      }
    });

    // タイトルのアニメーション
    const title = employeeHighsalarySection.querySelector('.employee_highsalary_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // 画像のアニメーション
    const img = employeeHighsalarySection.querySelector('.employee_highsalary_img');
    if (img) {
      tl.from(img, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // テキストのアニメーション
    const lead = employeeHighsalarySection.querySelector('.employee_highsalary_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    const bodies = employeeHighsalarySection.querySelectorAll('.employee_highsalary_body');
    bodies.forEach((body, index) => {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // employee_advantagesセクションのアニメーション設定
  const employeeAdvantagesSection = document.querySelector('#employee_advantages');
  if (employeeAdvantagesSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeAdvantagesSection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const head = employeeAdvantagesSection.querySelector('.employee_advantages_head');
    if (head) {
      tl.from(head, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // リード文のアニメーション
    const lead = employeeAdvantagesSection.querySelector('.employee_advantages_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // 本文のアニメーション
    const bodies = employeeAdvantagesSection.querySelectorAll('.employee_advantages_body');
    bodies.forEach((body, index) => {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    });

    // メリットアイテムのアニメーション
    const items = employeeAdvantagesSection.querySelectorAll('.employee_advantages_item');
    items.forEach((item) => {
      const itemTl = gsap.timeline({
        scrollTrigger: {
          trigger: item,
          start: 'top 80%'
        }
      });

      // ラベルのアニメーション
      const label = item.querySelector('.label');
      if (label) {
        itemTl.from(label, {
          y: 30,
          opacity: 0,
          duration: 0.6,
          ease: 'power2.out'
        });
      }

      // コンテンツのアニメーション
      const content = item.querySelector('.employee_advantages_item_content');
      if (content) {
        itemTl.from(content, {
          y: 30,
          opacity: 0,
          duration: 0.6,
          ease: 'power2.out'
        }, '-=0.3');
      }
    });
  }

  // employee_premiumセクションのアニメーション設定
  const employeePremiumSection = document.querySelector('#employee_premium');
  if (employeePremiumSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeePremiumSection,
        start: 'top 80%'
      }
    });

    // タイトルのアニメーション
    const title = employeePremiumSection.querySelector('.employee_premium_title');
    if (title) {
      tl.from(title, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // 画像のアニメーション
    const fig = employeePremiumSection.querySelector('.employee_premium_fig');
    if (fig) {
      tl.from(fig, {
        x: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // バルーンのアニメーション
    const balloon = employeePremiumSection.querySelector('.balloon');
    if (balloon) {
      tl.from(balloon, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // リード文のアニメーション
    const lead = employeePremiumSection.querySelector('.employee_premium_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // 本文のアニメーション
    const bodies = employeePremiumSection.querySelectorAll('.employee_premium_body');
    bodies.forEach((body, index) => {
      tl.from(body, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // employee_safetyセクションのアニメーション設定
  const employeeSafetySection = document.querySelector('#employee_safety');
  if (employeeSafetySection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeSafetySection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const head = employeeSafetySection.querySelector('.employee_safety_head');
    if (head) {
      tl.from(head, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // リード文のアニメーション
    const lead = employeeSafetySection.querySelector('.employee_safety_lead');
    if (lead) {
      tl.from(lead, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // セーフティリストアイテムのアニメーション
    const items = employeeSafetySection.querySelectorAll('.employee_safety_list_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.3');
    });

    // ボタンのアニメーション
    const btn = employeeSafetySection.querySelector('.employee_safety_btn');
    if (btn) {
      tl.from(btn, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // employee_voiceセクションのアニメーション設定
  const employeeVoiceSection = document.querySelector('#employee_voice');
  if (employeeVoiceSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeVoiceSection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const head = employeeVoiceSection.querySelector('.employee_voice_head');
    if (head) {
      tl.from(head, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // ボイスリンクアイテムのアニメーション
    const items = employeeVoiceSection.querySelectorAll('.voice_link_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // employee_recruitセクションのアニメーション設定
  const employeeRecruitSection = document.querySelector('#employee_recruit');
  if (employeeRecruitSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: employeeRecruitSection,
        start: 'top 80%'
      }
    });

    // カード全体のアニメーション
    const card = employeeRecruitSection.querySelector('.employee_recruit_card');
    if (card) {
      tl.from(card, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }
  }

  // parttime-kvセクションのアニメーション設定
  const parttimeKvSection = document.querySelector('#parttime-kv');
  if (parttimeKvSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeKvSection,
        start: 'top 80%'
      }
    });

    // ラインのアニメーション
    const line = parttimeKvSection.querySelector('.parttime-kv_line');
    if (line) {
      tl.from(line, {
        y: -300,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
        delay: 1.5
      }, '-=0.3');
    }
    // スクリプトのアニメーション
    const script = parttimeKvSection.querySelector('.parttime-kv_script-1');
    if (script) {
      tl.from(script, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // ロゴのアニメーション
    const logo = parttimeKvSection.querySelector('.parttime-kv_logo-1');
    if (logo) {
      tl.from(logo, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // タイトルコピーのアニメーション
    const titleCopy = parttimeKvSection.querySelector('.parttime-kv_title-copy');
    if (titleCopy) {
      tl.from(titleCopy, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // タイトルラベルのアニメーション
    const titleLabel = parttimeKvSection.querySelector('.parttime-kv_title-label');
    if (titleLabel) {
      tl.from(titleLabel, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // 円のアニメーション
    const circle = parttimeKvSection.querySelector('.parttime-kv_circle');
    if (circle) {
      tl.from(circle, {
        scale: 0.8,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // parttime_introセクションのアニメーション設定
  const parttimeIntroSection = document.querySelector('#parttime_intro');
  if (parttimeIntroSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeIntroSection,
        start: 'top 80%'
      }
    });

    // バッジのアニメーション
    const badge = parttimeIntroSection.querySelector('.parttime_intro_badge');
    if (badge) {
      tl.from(badge, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // 車の画像のアニメーション
    const carImage = parttimeIntroSection.querySelector('.parttime_intro_car-image');
    if (carImage) {
      tl.from(carImage, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // テキストのアニメーション
    const texts = parttimeIntroSection.querySelectorAll('.parttime_intro_text');
    texts.forEach((text, index) => {
      tl.from(text, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // parttime-service__go-reserveセクションのアニメーション設定
  const goReserveSection = document.querySelector('.parttime-service__go-reserve');
  if (goReserveSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: goReserveSection,
        start: 'top 80%'
      }
    });

    // ロゴのアニメーション
    const logo = goReserveSection.querySelector('.go-reserve__logo');
    if (logo) {
      tl.from(logo, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // テキストボックスのアニメーション
    const textBox = goReserveSection.querySelector('.go-reserve__text-box');
    if (textBox) {
      tl.from(textBox, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // parttime-service__go-shuttleセクションのアニメーション設定
  const goShuttleSection = document.querySelector('.parttime-service__go-shuttle');
  if (goShuttleSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: goShuttleSection,
        start: 'top 80%'
      }
    });

    // ロゴのアニメーション
    const logo = goShuttleSection.querySelector('.go-shuttle__logo');
    if (logo) {
      tl.from(logo, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // テキストボックスのアニメーション
    const textBox = goShuttleSection.querySelector('.go-shuttle__text-box');
    if (textBox) {
      tl.from(textBox, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // parttime_wworkセクションのアニメーション設定
  const parttimeWworkSection = document.querySelector('#parttime_wwork');
  if (parttimeWworkSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeWworkSection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const header = parttimeWworkSection.querySelector('.parttime_wwork__header');
    if (header) {
      tl.from(header, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // カードのアニメーション
    const cards = parttimeWworkSection.querySelectorAll('.parttime_wwork__card');
    cards.forEach((card, index) => {
      tl.from(card, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // parttime_fulltimeセクションのアニメーション設定
  const parttimeFulltimeSection = document.querySelector('#parttime_fulltime');
  if (parttimeFulltimeSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeFulltimeSection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const header = parttimeFulltimeSection.querySelector('.parttime_fulltime_header');
    if (header) {
      tl.from(header, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // ボタンのアニメーション
    const button = parttimeFulltimeSection.querySelector('.parttime_fulltime_button');
    if (button) {
      tl.from(button, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // parttime_workstyleセクションのアニメーション設定
  const parttimeWorkstyleSection = document.querySelector('#parttime_workstyle');
  if (parttimeWorkstyleSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeWorkstyleSection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const header = parttimeWorkstyleSection.querySelector('.parttime_workstyle_header');
    if (header) {
      tl.from(header, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // ワークスタイルアイテムのアニメーション
    const items = parttimeWorkstyleSection.querySelectorAll('.parttime_workstyle_item');
    items.forEach((item) => {
      const itemTl = gsap.timeline({
        scrollTrigger: {
          trigger: item,
          start: 'top 80%'
        }
      });

      // ラベルのアニメーション
      const label = item.querySelector('.label.barlow');
      if (label) {
        itemTl.from(label, {
          y: 30,
          opacity: 0,
          duration: 0.6,
          ease: 'power2.out'
        });
      }

      // コンテンツのアニメーション
      const content = item.querySelector('.parttime_workstyle_item_content');
      if (content) {
        itemTl.from(content, {
          y: 30,
          opacity: 0,
          duration: 0.6,
          ease: 'power2.out'
        }, '-=0.3');
      }
    });
  }

  // parttime_flowセクションのアニメーション設定
  const parttimeFlowSection = document.querySelector('#parttime_flow');
  if (parttimeFlowSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeFlowSection,
        start: 'top 80%'
      }
    });

    // ヘッダーのアニメーション
    const header = parttimeFlowSection.querySelector('.parttime_flow_header');
    if (header) {
      tl.from(header, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }

    // リストタイトルのアニメーション
    const listTitle = parttimeFlowSection.querySelector('.parttime_flow_list-title');
    if (listTitle) {
      tl.from(listTitle, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }

    // フローアイテムのアニメーション
    const items = parttimeFlowSection.querySelectorAll('.parttime_flow_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        delay: index * 0.1,
        ease: 'power2.out'
      }, '-=0.3');
    });

    // ボタンボックスのアニメーション
    const buttonBox = parttimeFlowSection.querySelector('.parttime_flow_button-box');
    if (buttonBox) {
      tl.from(buttonBox, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      }, '-=0.3');
    }
  }

  // parttime_voiceセクションのアニメーション設定
  const parttimeVoiceSection = document.querySelector('#parttime_voice');
  if (parttimeVoiceSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeVoiceSection,
        start: 'top 80%'
      }
    });

    // ボイスリンクアイテムのアニメーション
    const items = parttimeVoiceSection.querySelectorAll('.voice_link_item');
    items.forEach((item, index) => {
      tl.from(item, {
        y: 30,
        opacity: 0,
        duration: 0.6,
        delay: index * 0.2,
        ease: 'power2.out'
      }, '-=0.3');
    });
  }

  // parttime_recruitセクションのアニメーション設定
  const parttimeRecruitSection = document.querySelector('#parttime_recruit');
  if (parttimeRecruitSection) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: parttimeRecruitSection,
        start: 'top 80%'
      }
    });

    // カード全体のアニメーション
    const card = parttimeRecruitSection.querySelector('.parttime_recruit_card');
    if (card) {
      tl.from(card, {
        y: 50,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out'
      });
    }
  }
});
