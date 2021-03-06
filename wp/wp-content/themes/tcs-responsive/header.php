<?php get_template_part('header-main'); ?>

</head>

<body>

<?php

$nav = array(
  'menu'       => 'Main Navigation',
  'container'  => '',
  'menu_class' => 'root',
  'items_wrap' => '%3$s',
  'walker'     => new nav_menu_walker ()
);

?>

<div id="wrapper" class="tcssoUsingJS">
  <nav class="sidebarNav mainNav onMobi">
    <ul class="root"><?php wp_nav_menu($nav); ?>
      <li class="notLogged"><a href="javascript:;" class="btnRegister"><i></i>Sign Up</a></li>
      <li class="userLi isLogged">
        <div class="userInfo">
          <div class="userPic">
            <img src="" alt="">
          </div>
          <div class="userDetails">
            <a href="" class="coder"></a>
            <p class="country"></p>
            <a href="" class="link myProfileLink">My Profile</a>
            <a href="/my-dashboard" class="link">My TopCoder </a>
            <a href="//community.topcoder.com/tc?module=MyHome" class="link">Account Settings </a>
            <a href="javascript:;" class="actionLogout">Log Out</a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.sidebarNav -->
  <header id="navigation">
    <div class="container">
      <div class="headerTopRightMenu">
        <div class="headerTopRightMenuLink logIn">
          <div class="text"><a href="javascript:;" class="actionLogin" style="display: inline;">Log In</a></div>
          <div class="icon"></div>
          <div class="clear"></div>
        </div>
        <div class="separator"></div>
        <div class="headerTopRightMenuLink contact">
          <div class="text"><a href="/contact-us">Contact</a></div>
          <div class="clear"></div>
        </div>
        <div class="separator"></div>
        <div class="headerTopRightMenuLink help">
          <div class="text"><a href="http://help.topcoder.com">Help Center</a></div>
          <div class="clear"></div>
        </div>
        <div class="separator beforeSearch"></div>
        <div class="headerTopRightMenuLink search last">
          <div class="icon"></div>
          <div class="text"><a id="searchButton" href="#">Search</a></div>
          <div class="clear"></div>
        </div>
        <div id="searchWidget" class="hide">
            <div class="box">
              <div class="upperbox">
                <div class="searchArea">
                  <a id="btnSearchType" class="btn btnSearchType" href="#"><span id="searchTypeName">Site</span><i></i></a><input id="searchKeyword" type="text" class="searchInput" name="keyword" maxlength="64">
                  <div id="requiredText" class="hide">Please input search keyword</div>
                </div>
                <div id="searchTypeList" class="hide">
                  <a class="searchType">Site</a>
                  <a class="searchType">Members</a>
                </div>
              </div>
              <div class="lowerbox">
                <div class="searchText">Find what you are looking for.</div>
                <a id="searchButtonGo" class="btn btnGo" href="#">Go</a>
              </div>
            </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <h1 class="logo">
        <a href="<?php bloginfo('wpurl'); ?>" title="<?php bloginfo('name'); ?>"></a>
      </h1>
      <nav id="mainNav" class="mainNav">


        <ul class="root">
          <?php wp_nav_menu($nav); ?>
        </ul>
      </nav>
      <div class="userDetailsWrapper hide">
        <span class="btnAccWrap noReg">
          <a href="javascript:;" class="btn btnAlt btnMyAcc">
            My Account<i></i>
          </a>
        </span>

        <div class="userWidget">
          <div class="details">
            <div class="userPic">
              <img src="">
            </div>
            <div class="userDetails">
              <p class="country"></p>
              <!-- Bugfix I-109397: add Member Since title -->
              <p class="lbl">Member Since :</p>

              <p class="val memberSince"></p>

              <p class="lbl">Total Earnings :</p>

              <p class="val memberEarning"></p>
            </div>
          </div>
          <div class="action">
            <a class="profileLink" href="">My
              Profile</a>
            <a href="/my-dashboard">My TopCoder </a>
            <a href="//community.topcoder.com/tc?module=MyHome" class="linkAlt">Account Settings</a>
          </div>
        </div>
      </div>
      <a class="onMobi noReg linkLogin actionLogin" href="javascript:;">Log In</a>
      <span class="btnRegWrap noReg"><a href="javascript:;" class="btn btnRegister">Sign Up</a> </span>


      <!-- /.userWidget -->
    </div>
  </header>
<!-- Bugfix: I-108496 hidden element needed for non-firefox browsers to detect cache-persist status of page, used for above code to display member details -->
<input type='hidden' id='cache-persist'>
  <!-- /#header -->
