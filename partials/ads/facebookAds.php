    <style>
     #ad_root {
        display: none;
        font-size: 14px;
        height: 250px;
        line-height: 16px;
        position: relative;
        width: 300px;
      }
      .thirdPartyMediaClass {
        height: 157px;
        width: 300px;
      }
      .thirdPartyTitleClass {
        font-weight: 600;
        font-size: 16px;
        margin: 8px 0 4px 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }
      .thirdPartyBodyClass {
        display: -webkit-box;
        height: 32px;
        -webkit-line-clamp: 2;
        overflow: hidden;
      }
      .thirdPartyCallToActionClass {
        color: #326891;
        font-family: sans-serif;
        font-weight: 600;
        margin-top: 8px;
      }
    </style>
    <script>
      window.fbAsyncInit = function() {
        FB.Event.subscribe(
          'ad.loaded',
          function(placementId) {
            console.log('Audience Network ad loaded');
            document.getElementById('ad_root').style.display = 'block';
          }
        );
        FB.Event.subscribe(
          'ad.error',
          function(errorCode, errorMessage, placementId) {
            console.log('Audience Network error (' + errorCode + ') ' + errorMessage);
          }
        );
      };
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk/xfbml.ad.js#xfbml=1&version=v2.5&appId=1138567649507658";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>