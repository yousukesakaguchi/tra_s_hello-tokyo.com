// footer

const ft_link_recruit = document.querySelector(".ft_link_recruit");

if(ft_link_recruit){

  gsap.fromTo(".ft_link_recruit",
    {
      autoAlpha: 0
    },
    {
      autoAlpha: 1,
      scrollTrigger:{
        trigger: ".ft_link_recruit",
        start: "top center"
      }
    }
  )
}


const ft_tel = document.querySelector(".ft_tel");

if(ft_tel){
  gsap.fromTo(".ft_tel",
    {
      autoAlpha: 0
    },
    {
      autoAlpha: 1,
      scrollTrigger:{
        trigger: ".ft_tel",
        start: "top center",
      }
    }
  )
}

const ft_company = document.querySelector(".ft_company");

if(ft_company){
  gsap.fromTo(".ft_company",
    {
      autoAlpha: 0
    },
    {
      autoAlpha: 1,
      scrollTrigger:{
        trigger:".ft_company",
        start:"top center"
      }
    }
  )
}


const ft_contact = document.querySelector(".ft_contact");
if(ft_contact){
  gsap.fromTo(".ft_contact",
    {
      autoAlpha:0,
    },
    {
      autoAlpha:1,
      scrollTrigger:{
        trigger:".ft_contact",
        start:"top center"
      }
    }
  )
}


// Topページ

gsap.fromTo("#top_alphard", 
  {
    autoAlpha: 0,
  },
  {
    autoAlpha: 1,
    scrollTrigger: {
      trigger: "#top_alphard", // アニメーション開始のトリガー要素
      start: "top center", // アニメーション開始位置
    },
  }
);


gsap.fromTo("#top_group",
  {
  autoAlpha:0,
  },
  {
    autoAlpha:1,
    scrollTrigger: {
      trigger: "#top_group",
      start: "top center"

    }
  }
)



// aboutページ

gsap.fromTo("#about_section01",
  {
    autoAlpha:0
  },
  {
    autoAlpha:1,
    scrollTrigger:{
      trigger:"#about_section01",
      start: "top center"
    }
  }
)

gsap.fromTo("#about_section02",
  {
    autoAlpha:0
  },
  {
    autoAlpha:1,
    scrollTrigger:{
      trigger:"#about_section02",
      start: "top center"
    }
  }
)

gsap.fromTo("#about_section03",
  {
    autoAlpha:0
  },
  {
    autoAlpha:1,
    scrollTrigger:{
      trigger:"#about_section03",
      start: "top center"
    }
  }
)

gsap.fromTo("#about_section04",
  {
    autoAlpha:0
  },
  {
    autoAlpha:1,
    scrollTrigger:{
      trigger:"#about_section04",
      start: "top center"
    }
  }
)


// employee

gsap.fromTo("#employee_top",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#employee_top",
      start: "top center"
    }
})


gsap.fromTo("#employee_spec",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#employee_spec",
      start: "top center"
    }
})

gsap.fromTo("#employee_mission",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#employee_mission",
      start: "top center"
    }
})


gsap.fromTo("#employee_merit",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#employee_merit",
      start: "top center"
    }
})

const walfare_btn_content =document.querySelector(".walfare_btn_content");

if(walfare_btn_content){
  gsap.fromTo(".walfare_btn_content",
    {
      autoAlpha: 0
    },
    {
      autoAlpha: 1,
      scrollTrigger:{
        trigger: ".walfare_btn_content",
        start: "top center"
      }
  })
}

gsap.fromTo("#employee_recruitment",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#employee_recruitment",
      start: "top center"
    }
})


// parttime


gsap.fromTo("#parttime_section01",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#parttime_section01",
      start: "top center"
    }
})

gsap.fromTo("#parttime_section02",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#parttime_section02",
      start: "top center"
    }
})

gsap.fromTo("#parttime_section03",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#parttime_section03",
      start: "top center"
    }
})

gsap.fromTo("#parttime_section04",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#parttime_section04",
      start: "top center"
    }
})

gsap.fromTo("#parttime_section05",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#parttime_section05",
      start: "top center"
    }
})


gsap.fromTo("#parttime_recruitment",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#parttime_recruitment",
      start: "top center"
    }
})


// privacypolicy
gsap.fromTo("#policy",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#policy",
      start: "top center"
    }
})


// site_policy

gsap.fromTo("#site_policy",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#site_policy",
      start: "top center"
    }
})

// walfare
gsap.fromTo("#infographic",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#infographic",
      start: "top center"
    }
})

gsap.fromTo("#training",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#training",
      start: "top center"
    }
})

gsap.fromTo("#benefit",
  {
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    scrollTrigger:{
      trigger: "#benefit",
      start: "top center"
    }
})



