<?php
/**
 * Template Name: Angular Challenge Details
 */

/**
 * @file
 * This template displays the details of a particular challenge.
 */

tc_setup_angular();

$activeTab = $tab;
add_action('wp_head', 'tc_challenge_details_js');

function tc_challenge_details_js() {
  global $contest, $contestType, $contestID, $registrants, $activeTab;

  $regEnd = strtotime("$contest->registrationEndDate") || 1;
  $submissionEnd = strtotime("$contest->submissionEndDate") || 1
  ?>
  <script type="text/javascript">
    var activeTab = "<?php echo $activeTab;?>";
    if (window.location.hash == '#viewRegistrant' || window.location.hash == '#/viewRegistrant') activeTab = 'registrants';
    else if (window.location.hash == '#winner' || window.location.hash == '#/winner' || window.location.hash == '#winners' || window.location.hash == '#/winners') activeTab = 'results';
    else if (window.location.hash == '#submissions' || window.location.hash == '#/submissions') activeTab = 'submissions';
    var registrationUntil = new Date(<?php echo $regEnd ?> * 1000);
    var submissionUntil = new Date(<?php echo $submissionEnd ?> * 1000);
    var challengeId = "<?php echo $contestID;?>";
    var challengeType = "<?php echo $contestType;?>";
    var autoRegister = "<?php echo get_query_var('autoRegister');?>";
    var handle = ""; // fix me
    var challengeName; //prevent undefined error, value is set in angular script
    var THEME_URL = "<?php echo THEME_URL;?>";
  </script>

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="{{CD.challenge.challengeName}}">
  <meta itemprop="description" content="{{CD.challenge.detailedRequirements | htmlToText }}">

  <!-- Twitter Card data -->
  <meta name="twitter:site" content="@topcoder">
  <meta name="twitter:title" content="{{CD.challenge.challengeName}}">
  <meta name="twitter:description" content="{{CD.challenge.detailedRequirements | htmlToText | limitTo: 200}}">
  <meta name="twitter:creator" content="@topcoder">

  <!-- Open Graph data -->
  <meta property="og:title" content="{{CD.challenge.challengeName}}" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{CD.challenge.url}}" />
  <meta property="og:description" content="{{CD.challenge.detailedRequirements | htmlToText}}" />
  <meta property="og:site_name" content="topcoder" />
  <meta property="article:published_time" content="{{CD.challenge.postingDate}}" />
<?php
}

$isChallengeDetails = TRUE;

$contestID   = get_query_var('contestID');
$contestType = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
$contestType = empty( $contestType ) ? "develop" : $contestType;
$noCache     = get_query_var('nocache');

$registerDisable = FALSE;
$submitDisabled  = FALSE;

// need for header file
$contest_type = $contestType;

include locate_template('header-challenge-landing.php');

?>

<div id="cdNgMain" ng-init="CD.callComplete=false" ng-show="CD.callComplete" class="hide content challenge-detail view-challenge-result {{CD.challengeType != 'design' ? 'develop' : ''}}">
<div id="main">

<?php include( locate_template('ng-content-basic-challenge-details.php') ); ?>

<article id="mainContent" class="splitLayout <?php if (!empty( $activeTab )) {echo 'currentTab-' . $activeTab;} ?>">
<div class="container">
  <div id="stepBox">
    <div class="container rightSplit  grid-3-3">

      <div class="leftColumn">
        <a ng-show="!CD.isDesign" ng-click="CD.registerToChallenge()" ng-class="{disabled:CD.challenge.registrationDisabled || !CD.callComplete, disabledNOT:!CD.challenge.registrationDisabled}" class="btn btnAction challengeRegisterBtn" href="javascript:;">
            <span>1</span><strong>Register For This Challenge</strong>
        </a>
        <a ng-show="!CD.isDesign" ng-class="{disabled:CD.challenge.submissionDisabled || !CD.callComplete, disabledNOT:!CD.challenge.submissionDisabled}" class="btn btnAction" target="_blank"
          ng-href="/challenge-details/{{CD.challenge.challengeId}}/submit/?type=develop">
            <span>2</span><strong>Submit Your Entries</strong>
        </a>
        <a ng-show="CD.isDesign" ng-click="CD.registerToChallenge()" ng-class="{disabled:CD.challenge.registrationDisabled || !CD.callComplete, disabledNOT:!CD.challenge.registrationDisabled}" class="btn btnAction challengeRegisterBtn" href="javascript:;">
            <span>1</span> <strong>Register For This Challenge</strong>
        </a>
        <a ng-show="CD.isDesign" ng-class="{disabled:CD.challenge.submissionDisabled || !CD.callComplete, disabledNOT:!CD.challenge.submissionDisabled}" class="btn btnAction" target="_blank"
           ng-href="//studio.topcoder.com/?module=ViewRegistration&ct={{CD.challenge.challengeId}}">
            <span>2</span> <strong>Submit Your Entries</strong>
        </a>
        <a ng-show="CD.isDesign" ng-class="{disabled:CD.challenge.submissionDisabled || !CD.callComplete, disabledNOT:!CD.challenge.submissionDisabled}" class="btn btnAction" target="_blank"
           href="//studio.topcoder.com/?module=ViewSubmission&ct={{CD.challenge.challengeId}}">
            <span>3</span> <strong>View Your Submission</strong>
        </a>
        <a ng-show="!CD.isDesign && CD.isPeerReviewed" ng-class="{disabled:CD.challenge.peerReviewDisabled || !CD.callComplete, disabledNOT:!CD.challenge.peerReviewDisabled}" class="btn btnAction" ng-href="/reviews/index.html#/challenge/{{CD.challenge.challengeId}}" target="_blank">
            <span>3</span><strong>Review This Challenge</strong>
        </a>
      </div>

      <div class="middleColumn member-program-path" ng-show="CD.isPeerReviewed && CD.phaseProgram">
        <div ng-include src="getTemplateURL('ng-content-challenge-topsection.tpl.html')"></div>
      </div>
      <div class="middleColumn {{CD.isDesign ? 'studio' : ''}}" ng-show="!CD.isPeerReviewed">
        <table class="prizeTable">
          <tbody>

            <tr>
              <td ng-if="!CD.isDesign && CD.challenge.challengeType != 'Code'" class="fifty">
                <h2>1st PLACE</h2>

                <h3>
                  <small>$</small><span ng-bind="CD.challenge.prize ? (CD.challenge.prize[0] ? CD.challenge.prize[0] : '') : ''"></span>
                </h3>
              </td>
              <td ng-if="!CD.isDesign && CD.challenge.challengeType != 'Code'" class="fifty">
                <h2>2nd PLACE</h2>
                <h3>
                  <small>$</small><span ng-bind="CD.challenge.prize ? (CD.challenge.prize[1] ? CD.challenge.prize[1] : '0') : ''"></span>
                </h3>
              </td>
              <td ng-if="(designOrCode = CD.isDesign || CD.challenge.challengeType == 'Code')" class="twenty {{!(CD.challenge.prize && CD.challenge.prize[0]) ? 'noPrize' : ''}}">
                <h2>1st PLACE</h2>

                <h3>
                  <small>$</small><span ng-bind="(CD.challenge.prize && CD.challenge.prize[0]) || 0"></span></h3>
              </td>
              <td ng-if="designOrCode" class="twenty {{!(CD.challenge.prize && CD.challenge.prize[1]) ? 'noPrize' : ''}}">
                <h2>2nd PLACE</h2>

                <h3>
                  <small>$</small><span ng-bind="(CD.challenge.prize && CD.challenge.prize[1]) || 0"></span></h3>
              </td>
              <td ng-if="designOrCode" class="twenty {{!(CD.challenge.prize && CD.challenge.prize[2]) ? 'noPrize' : ''}}">
                <h2>3rd PLACE</h2>

                <h3>
                  <small>$</small><span ng-bind="(CD.challenge.prize && CD.challenge.prize[2]) || 0"></span></h3>
              </td>
              <td ng-if="designOrCode" class="twenty {{!(CD.challenge.prize && CD.challenge.prize[3]) ? 'noPrize' : ''}}">
                <h2>4th PLACE</h2>

                <h3>
                  <small>$</small><span ng-bind="(CD.challenge.prize && CD.challenge.prize[3]) || 0"></span></h3>
              </td>
              <td ng-if="designOrCode" class="twenty {{!(CD.challenge.prize && CD.challenge.prize[4]) ? 'noPrize' : ''}}">
                <h2>5th PLACE</h2>

                <h3>
                  <small>$</small><span ng-bind="(CD.challenge.prize && CD.challenge.prize[4]) || 0"></span></h3>
              </td>
              <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize.length > 5)" class="morePayments active closed" rowspan="2">
              </td>
              <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize.length <= 5)" class="morePayments inactive" rowspan="2">
              </td>
            </tr>
            <tr ng-if="CD.challenge.prize  && CD.challenge.prize.length > 5 && (currentPlace = 6)" class="additionalPrizes hide" ng-repeat="i in range(0, (CD.challenge.prize.length - 5) / 5)">
              <td class="twenty" ng-if="CD.challenge.prize.length > 5 + i * 5" ng-repeat="j in range(i * 5, max((i + 1) * 5), CD.challenge.prize.length)">
                <h2 ng-bind-template="{{j + 1}}'th PLACE'"></h2>
                <h3><small>$</small><span ng-bind="CD.challenge.prize[j]"></span></h3>
              </td>
            </tr>
            <tr><!-- Bugfix: Added noPrize class when challenge has no reliability bonus -->
              <td ng-if="!CD.isDesign" colspan="5" class="{{ (!CD.challenge.reliabilityBonus || CD.challenge.challengeType === 'Bug Hunt') ? 'noPrize' : ''}}">
                <p class="realibilityPara">
                  Reliability Bonus
                  <span ng-if="CD.reliabilityBonus && CD.challenge.challengeType !== 'Bug Hunt'" ng-bind-template="${{CD.challenge.reliabilityBonus}}">
                  </span>
                  <span ng-if="!(CD.reliabilityBonus) || CD.challenge.challengeType === 'Bug Hunt'">
                    N/A
                  </span>
                </p>
              </td>
              </td>
              <td ng-if="CD.isDesign" colspan="5">
                <p class="scPoints" ng-if="CD.challenge.numberOfCheckpointsPrizes > 0"><span ng-bind="CD.challenge.numberOfCheckpointsPrizes"></span> CHECKPOINT AWARDS WORTH <span ng-bind-template="${{CD.challenge.topCheckPointPrize}}"></span>
                  EACH</p>
                <p class="scPoints" ng-if="CD.challenge.numberOfCheckpointsPrizes == 0">NO CHECKPOINT AWARDS</p>
              </td>
            </tr>
          </tbody>
        </table>
      <!-- TODO: not sure why this code is repeated -- probably get rid of it (or make sure my fix of it is correct) -->
      <div class="prizeSlider hide">
        <ul>
          <li class="slide">
            <table>
              <tbody>
                <tr>
                  <td ng-if="!CD.isDesign && CD.challenge.challengeType != 'Code'" class="fifty">
                    <h2>1st PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize ? (CD.challenge.prize[0] ? CD.challenge.prize[0] : '') : ''"></span>
                    </h3>
                  </td>
                  <td ng-if="!CD.isDesign && CD.challenge.challengeType != 'Code'" class="fifty">
                    <h2>2nd PLACE</h2>
                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize ? (CD.challenge.prize[1] ? CD.challenge.prize[1] : '0') : ''"></span>
                    </h3>
                  </td>
                  <td ng-if="(designOrCode = CD.isDesign || CD.challenge.challengeType == 'Code') && (CD.challenge.prize && CD.challenge.prize[0])" class="twenty">
                    <h2>1st PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize[0]"></span>
                    </h3>
                  </td>
                  <td ng-if="designOrCode && !(CD.challenge.prize && CD.challenge.prize[0])" class="twenty noPrize">
                    <h2>1st PLACE</h2>

                    <h3>
                      <small>$</small>0
                    </h3>
                  </td>
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize[1])" class="twenty">
                    <h2>2nd PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize[1]"></span>
                    </h3>
                  </td>
                  <td ng-if="designOrCode && !(CD.challenge.prize && CD.challenge.prize[1])" class="twenty noPrize">
                    <h2>2nd PLACE</h2>

                    <h3>
                      <small>$</small>0
                    </h3>
                  </td>
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize[2])" class="twenty">
                    <h2>3rd PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize[2]"></span>
                    </h3>
                  </td>
                  <td ng-if="designOrCode && !(CD.challenge.prize && CD.challenge.prize[2])" class="twenty noPrize">
                    <h2>3rd PLACE</h2>

                    <h3>
                      <small>$</small>0
                    </h3>
                  </td>
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize[3])" class="twenty">
                    <h2>4th PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize[3]"></span>
                    </h3>
                  </td>
                  <td ng-if="designOrCode && !(CD.challenge.prize && CD.challenge.prize[3])" class="twenty noPrize">
                    <h2>4th PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize[3]"></span>
                    </h3>
                  </td>
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize[4])" class="twenty">
                    <h2>5th PLACE</h2>

                    <h3>
                      <small>$</small><span ng-bind="CD.challenge.prize[4]"></span>
                    </h3>
                  </td>
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize[5])" class="twenty noPrize">
                    <h2>5th PLACE</h2>

                    <h3>
                      <small>$</small>0
                    </h3>
                  </td>
                  <!-- previously used rowspan logic might be needed: {{2 + ((CD.challenge.prize.length - 5) / 5)}} -->
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize.length > 5)" class="morePayments active closed" rowspan="2">
                  </td>
                  <td ng-if="designOrCode && (CD.challenge.prize && CD.challenge.prize.length <= 5)" class="morePayments inactive" rowspan="2">
                  </td>
                </tr>
                <tr ng-if="CD.challenge.prize  && CD.challenge.prize.length > 5 && (currentPlace = 6)" class="additionalPrizes hide" ng-repeat="i in range(0, (CD.challenge.prize.length - 5) / 5)">
                  <td class="twenty" ng-if="CD.challenge.prize.length > 5 + i * 5" ng-repeat="j in range(i * 5, max((i + 1) * 5), CD.challenge.prize.length)">
                    <h2 ng-bind-template="{{j + 1}}'th PLACE'"></h2>
                    <h3><small>$</small><span ng-bind="CD.challenge.prize[j]"></span></h3>
                  </td>
                </tr>
                <tr>
                  <td ng-if="!CD.isDesign" colspan="5">
                    <p class="realibilityPara">
                      Reliability Bonus
                      <span ng-if="CD.reliabilityBonus && CD.reliabilityBonus.length > 0">
                        {{CD.challenge.reliabilityBonus}}
                      </span>
                      <span ng-if="!(CD.reliabilityBonus && CD.reliabilityBonus.length > 0)">
                        N/A
                      </span>
                    </p>
                  </td>
                  </td>
                  <td ng-if="CD.isDesign" colspan="5">
                    <p class="scPoints"><span ng-bind="CD.challenge.numberOfCheckpointsPrizes"></span> CHECKPOINT AWARDS WORTH $<span ng-bind="CD.challenge.topCheckPointPrize"></span>
                      EACH</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
        </ul>

      </div>

    </div>
    <div class="rightColumn">

      <div class="nextBox" ng-init="toggleAllNext = true;">

        <div class="nextBoxContent nextDeadlineNextBoxContent"  ng-show="toggleAllNext">
          <div class="icoTime">
            <span class="nextDTitle">Current Phase</span>
            <!-- Bugfix I-106745: if current status of contest is not Active, output current contest status, else output current contest phase if active. -->
            <span
              class="CEDate" ng-bind="CD.challenge.currentStatus.indexOf('Active') < 0 ? CD.challenge.currentStatus : CD.challenge.currentPhaseName"></span>
          </div>
          <!-- Bugfix I-106745: Added check for cancelled contest before display of current phase remaining time -->
          <span ng-if="CD.challenge.currentStatus != 'Completed' && CD.challenge.currentStatus != 'Deleted' && CD.challenge.currentStatus.indexOf('Cancelled') < 0 && CD.challenge.currentPhaseRemainingTime > 0" class="timeLeft">
            <span ng-bind="CD.challenge.currentPhaseRemainingTime | daysLeft"></span>
            <small><ng-pluralize count="CD.challenge.currentPhaseRemainingTime | daysLeft" when="{'1': 'Day', 'other': 'Days'}"/></small>
            <span ng-bind="CD.challenge.currentPhaseRemainingTime | hoursLeft"></span>
            <small><ng-pluralize count="CD.challenge.currentPhaseRemainingTime | hoursLeft" when="{'1': 'Hour', 'other': 'Hours'}"/></small>
            <span ng-bind="CD.challenge.currentPhaseRemainingTime | minsLeft"></span>
            <small><ng-pluralize count="CD.challenge.currentPhaseRemainingTime | minsLeft" when="{'1': 'Min', 'other': 'Mins'}"/></small>
          </span>
        </div>
        <!--End nextBoxContent-->
        <div ng-if="!CD.isDesign" class="nextBoxContent allDeadlineNextBoxContent ng-hide" ng-show="!toggleAllNext">
          <p><label>Start Date:</label>
            <span>
             {{CD.challenge.postingDate | formatDate:2}}
            </span>
          </p>
          <p><label>Register By:</label>
           <span>
             {{CD.challenge.registrationEndDate | formatDate:2}}
           </span>
          </p>
          <p class="{{CD.challenge.finalFixEndDate ? '' : 'last'"><label>Submit By:</label>
            <span>
              {{CD.challenge.submissionEndDate | formatDate:2}}
            </span>
          </p>
          <p ng-show="CD.inReview && CD.isPeerReviewed">
            <label>Review By:</label>
            <span>
              {{CD.challenge.currentPhaseEndDate | formatDate:2}}
            </span>
          </p>

          <p ng-if="CD.challenge.finalFixEndDate" class="{{CD.challenge.finalFixEndDate ? 'last' : ''"><label>Final Submission:</label>
            <span>
              {{CD.challenge.finalFixEndDate | formatDate:2}}
            </span>
          </p>

        </div>
        <!--End nextBoxContent-->
        <div ng-if="CD.isDesign" class="nextBoxContent allDeadlineNextBoxContent studio ng-hide" ng-show="!toggleAllNext">
          <p><label>Start Date:</label>
            <span>
              {{CD.challenge.postingDate | formatDate:2}}
            </span>
          </p>
          <p ng-if="CD.challenge.checkpointSubmissionEndDate != ''"><label>Checkpoint:</label>
            <span>
              {{CD.challenge.checkpointSubmissionEndDate | formatDate:2}}
            </span>
          </p>

          <p><label>End Date:</label>
            <span>
              {{CD.challenge.submissionEndDate | formatDate:2}}
            </span>
          </p>

          <p class="last"><label>Winners Announced:</label>
            <span>
              {{CD.challenge.appealsEndDate  | formatDate:2}}
            </span>
          </p>
        </div>
        <!--End nextBoxContent-->
      </div>

      <!--End nextBox-->
      <div class="deadlineBox">

        <div class="deadlineBoxContent nextDeadlinedeadlineBoxContent" ng-show="toggleAllNext">
          <a class="viewAllDeadLineBtn" ng-click="toggleAllNext = !toggleAllNext">View all deadlines +</a>
        </div>
        <!--End deadlineBoxContent-->
        <div class="deadlineBoxContent allDeadlinedeadlineBoxContent ng-hide" ng-show="!toggleAllNext">
          <a class="viewNextDeadLineBtn" ng-click="toggleAllNext = !toggleAllNext">View next deadline +</a>
        </div>
        <!--End deadlineBoxContent-->
      </div>
      <!--End deadlineBox-->
    </div>
    </div>
  </div><!-- Step Box end -->

<div class="rightSplit  grid-3-3">
<div class="mainStream partialList">

<section class="tabsWrap">
<nav class="tabNav">
  <div class="topRightTitle topRightTitleAlt" style="position: relative;">
    <a ng-show="CD.isRegistered" ng-href="{{CD.challenge.forumLink}}" class="contestForumIcon" target="_blank">Challenge Discussion</a>
  </div>
  <ul>
    <li><a href="#contest-overview" class="active link">Details</a></li>
    <li ng-show="!CD.isDesign">
      <a href="#viewRegistrant" class="link">Registrants ({{CD.numRegistrants}}) & Submissions ({{CD.numSubmissions}})</a>
    </li>
    <li ng-show="CD.isDesign">
      <a href="#viewRegistrant" class="link">Registrants ({{CD.numRegistrants}})</a>
    </li>
    <li ng-show="(CD.challenge.checkpoints && CD.challenge.checkpoints.length > 0) || CD.checkpointData"><a href="#checkpoints" class="link">Checkpoints ({{CD.numCheckpointSubmissions}})</a></li>
    <!-- @FIXME took out checkpoint stuff here
    < ?php if (( !empty( $checkpointData ) && $checkpointData != "Error in processing request" ) || ( $tab === "checkpoints" )): ?>
      <li><a href="#checkpoints" class="link {{activeTab == 'checkpoints' ? 'active' : ''}}">Checkpoints</a></li>
    < ?php endif; ?>
    -->
    <li ng-show="!CD.isDesign"><a href="#winner" class="link">Results</a></li>

    <!-- @FIXME: more checkpoint stuff commented out
    < ?php if (( !empty( $checkpointData ) && $checkpointData != "Error in processing request" ) || ( $tab === "checkpoints" )): ?>
      <li><a href="#checkpoints" class="link < ?php if ($tab === "checkpoints") { echo "active"; } ?>">Checkpoints</a></li>
    < ?php endif; ?>
    -->
    <!--<li ng-if="CD.isDesign && CD.inSubmission"><span class="inactive">Submissions</span></li>-->
    <li ng-show="CD.isDesign && !CD.inSubmission"><a href="#submissions" class="link">Submissions {{CD.submissionNumberString()}}</a></li>
    <li ng-show="CD.isDesign && (CD.inSubmission || CD.inScreening || CD.inReview)"><span class="inactive">Results</span></li>
    <li ng-show="CD.isDesign && !(CD.inSubmission || CD.inScreening || CD.inReview)"><a href="#winner" class="link">Results</a></li>
  </ul>
</nav>
<nav class="tabNav firstTabNav designFirstTabNav mobile hide">
  <ul>
    <li><a href="#contest-overview" class="active link">Details</a></li>
    <li>
      <a href="#viewRegistrant" class="link">Registrants ({{CD.numRegistrants}})</a>
    </li>
  </ul>
</nav>
<nav class="tabNav firstTabNav designSecondTabNav mobile hide">
  <ul>
    <li ng-if="CD.inSubmission"><span class="inactive">Checkpoints ({{CD.numCheckpointSubmissions}})</span></li>
    <!-- FIXME: took out checkpoint data stuff here. It didn't seem like it was being used.
      <li ng-if="!CD.inSubmission"><a href="<?php echo CURRENT_FULL_URL; ?>&tab=checkpoints" class="link">Checkpoints</a></li>
    -->
    <li ng-show="CD.inSubmission"><span class="inactive">Submissions</span></li>
    <li ng-show="!CD.inSubmission"><a href="#submissions" class="link">Submissions {{CD.submissionNumberString()}}</a></li>
    </li>
    <li>
      <li ng-show="CD.inSubmission || CD.inScreening || CD.inReview"><span class="inactive">Results</span></li>
      <li ng-show="!(CD.inSubmission || CD.inScreening || CD.inReview)"><a href="#winner" class="link">Results</a></li>
    </li>
  </ul>
</nav>

<div ng-if="!CD.isDesign" id="contest-overview" class="tableWrap {{CD.activeTab != 'details' ? 'hide' : ''}} tab">
  <article ng-if="!CD.isDesign" id="contestOverview">
    <h1>Challenge Overview</h1>

    <p ng-bind-html="CD.challenge.detailedRequirements | trust"></p>

    <article id="platforms">
      <h1>Platforms</h1>
      <ul>
        <li ng-if="(hasPlatforms = CD.challenge.platforms && CD.challenge.platforms.length > 0)" ng-repeat="platform in CD.challenge.platforms" >
          <strong ng-bind="platform"></strong>
        </li>
        <li ng-if="!(hasPlatforms = CD.challenge.platforms && CD.challenge.platforms.length > 0)">
          <strong>Not Specified</strong>
        </li>
      </ul>
    </article>

    <article id="technologies">
      <h1>Technologies</h1>
      <div class="technologyTags">
        <ul>
          <li ng-if="CD.challenge.technology && CD.challenge.technology.length > 0" ng-repeat="tech in CD.challenge.technology">
            <span>{{tech}}</span>
          </li>
          <li ng-if="!(CD.challenge.technology && CD.challenge.technology.length > 0)">
            <strong>Not Specified</strong>
          </li>

        </ul>
      <div class="clear"></div>
      </div>
    </article>

    <h3>Final Submission Guidelines</h3>
    <div ng-bind-html="CD.challenge.finalSubmissionGuidelines | trust"></div>

    <article id="payments">
      <h1>Payments</h1>

      <p>TopCoder will compensate members in accordance with the payment structure of this challenge.
        Initial payment for the winning member will be distributed in two installments. The first payment
        will be made at the closure of the approval phase. The second payment will be made at the
        completion of the support period.</p>

      <h2>Reliability Rating and Bonus</h2>

      <p>For challenges that have a reliability bonus, the bonus depends on the reliability rating at
        the moment of registration for that project. A participant with no previous projects is
        considered to have no reliability rating, and therefore gets no bonus.
        Reliability bonus does not apply to Digital Run winnings. Since reliability rating is
        based on the past 15 projects, it can only have 15 discrete values.<br>
        <a href="http://help.topcoder.com/development/understanding-reliability-and-ratings/">Read more.</a></p>
    </article>

  </article>

</div>
<div ng-if="CD.isDesign" id="contest-overview" class="tableWrap {{CD.activeTab != 'details' ? 'hide' : ''}} tab">
<article ng-if="CD.isDesign" id="contestOverview">

  <article id="contestSummary">
    <h1>CHALLENGE SUMMARY</h1>

    <p class="paragraph" ng-bind-html="CD.challenge.introduction | trust"></p>

    <p></p>

    <p class="paragraph1"><b>Please read the challenge specification carefully and watch the forums for any
        questions or feedback concerning this challenge. It is important that you monitor any updates
        provided by the client or Studio Admins in the forums. Please post any questions you might have for
        the client in the forums.</b></p>
  </article>

  <article id="studioTournamentFormat" ng-if="CD.challenge.numberOfCheckpointsPrizes > 0">
    <h1>CHALLENGE FORMAT</h1>
    <p class="paragraph">This competition will be run as a two-round challenge.</p>
    <div>
      <span class="subTitle">Round One (1)</span>

      <p class="paragraph"></p>

      <p style="margin: 0px 0px 0px 15px; padding: 0px; color: rgb(64, 64, 64);"><span
          style="line-height: 1.6em;" ng-bind-html="CD.challenge.round1Introduction | trust"></span></p>

      <span class="subTitle">Round Two (2)</span>

      <p class="paragraph"></p>

      <p><span style="color: rgb(64, 64, 64); font-size: 13px;" ng-bind-html="CD.challenge.round2Introduction | trust"></span></p>

      <p></p>


      <h6 class="smallTitle red">Regarding the Rounds:</h6>

      <p></p>

      <ul class="red">
        <li>To be eligible for Round 1 prizes and design feedback, you must submit before the Checkpoint
          deadline.
        </li>
        <li>A day or two after the Checkpoint deadline, the challenge holder will announce Round 1 winners and
          provide design feedback to those winners in the "Checkpoints" tab above.
        </li>
        <li>You must submit to Round 1 to be eligible to compete in Round 2. If your submission fails
          screening for a small mistake in Round 1, you may still be eligible to submit to Round 2.
        </li>
        <li>Every competitor with a passing Round 1 submission can submit to Round 2, even if they didn't
          win a Checkpoint prize.
        </li>
        <li><a
            href="http://help.topcoder.com/design/submitting-to-a-design-challenge/multi-round-checkpoint-design-challenges/">Learn
            more here</a>.
        </li>
      </ul>
    </div>
  </article>

  <article id="fullDescription">
    <h1>FULL DESCRIPTION &amp; PROJECT GUIDE</h1>

    <p ng-bind-html="CD.challenge.detailedRequirements | trust"></p>
  </article>

  <article id="stockPhotography">
    <h1>STOCK PHOTOGRAPHY</h1>

    <p ng-if="CD.challenge.allowStockArt"> Stock photography is allowed in this challenge.<br>
      <a href="http://help.topcoder.com/design/design-copyright-and-font-policies/policy-for-stock-photos-in-design-submissions/">See this page for more details.</a></p>

    <p ng-if="!CD.challenge.allowStockArt">Stock photography is not allowed in this challenge. All submitted elements must be designed solely by you.<br>
      <a href="http://help.topcoder.com/design/design-copyright-and-font-policies/policy-for-stock-photos-in-design-submissions/">See
         this page for more details.</a></p>

  </article>

  <article id="howtosubmit">
    <h1>HOW TO SUBMIT</h1>

    <p>
    <ul class="howToSubmit">
      <li>New to Studio? <a
          href="http://help.topcoder.com/design/submitting-to-a-design-challenge/getting-started-in-design-challenges/"
          target="_blank">Learn how to compete
          here</a>.
      </li>
      <li>Upload your submission in three parts (<a
          href="http://help.topcoder.com/design/submitting-to-a-design-challenge/formatting-your-submission-for-design-challenges/"
          target="_blank">Learn more here</a>). Your design should be finalized and should contain only a single design
        concept (do not include multiple designs in a single submission).
      </li>
      <li>If your submission wins, your source files must be correct and
        "<a href="http://help.topcoder.com/design/submitting-to-a-design-challenge/design-final-fixes-policies/"
            target="_blank">Final Fixes</a>" (if
        applicable) must be completed before payment can be released.
      </li>
      <li>You may submit as many times as you'd like during the submission phase, but only the number of files
        listed above in the Submission Limit that you rank the highest will be considered. You can change
        the order of your submissions at any time during the submission phase. If you make revisions to your
        design, please delete submissions you are replacing.
      </li>
    </ul>
    </p>
  </article>

  <article id="winnerselection">
    <h1>WINNER SELECTION</h1>

    <p>
      Submissions are viewable to the client as they are entered into the challenge. Winners are selected by the
      client and are chosen solely at the Client's discretion.
    </p>
  </article>

  <article id="payments">
    <h1>PAYMENTS</h1>

    <p>TopCoder will compensate members in accordance with the payment structure of this challenge.
      Initial payment for the winning member will be distributed in two installments. The first payment
      will be made at the closure of the approval phase. The second payment will be made at the
      completion of the support period.</p>

    <h2>Reliability Rating and Bonus</h2>

    <p>For challenges that have a reliability bonus, the bonus depends on the reliability rating at
      the moment of registration for that project. A participant with no previous projects is
      considered to have no reliability rating, and therefore gets no bonus.
      Reliability bonus does not apply to Digital Run winnings. Since reliability rating is
      based on the past 15 projects, it can only have 15 discrete values.<br>
      <a href="http://help.topcoder.com/development/understanding-reliability-and-ratings/">Read more.</a></p>
  </article>

</article>
</div>

<div id="viewRegistrant" class="tableWrap {{CD.activeTab != 'registrants' ? 'hide' : ''}} tab" style="">


  <article>
    <table class="registrantsTable">
      <thead>
      <tr>
        <th class="handleColumn">
          <div>Username</div>
        </th>
        <th ng-if="!CD.isDesign" class="ratingColumn">
          <div>Rating</div>
        </th>
        <th ng-if="!CD.isDesign" class="reliabilityColumn">
          <div>Reliability</div>
        </th>
        <th class="regDateColumn">
          <div>Registration Date</div>
        </th>
        <th class="subDateColumn">
          <div>Submission Date</div>
        </th>
        <th class="successIconColumn">
          <div>Result</div>
        </th>
      </tr>
      </thead>
      <tbody>
      <tr ng-repeat="registrant in CD.challenge.registrants | orderBy:'registrationDate'">
        <td ng-class="CD.challengeType == 'design' ? 'handleColumnDesign' : 'handleColumn'">
            <span>
                <a ng-href="{{CD.siteURL + '/member-profile/' + registrant.handle}}" ng-bind="registrant.handle"></a>
            </span>
        </td>
        <td ng-if="!CD.isDesign" class="ratingColumn">
            <span style="{{registrant.colorStyle}}" ng-bind="registrant.rating || 0" ng-bind="registrant.rating || 0"></span>
        </td>
        <td ng-if="!CD.isDesign" class="reliabilityColumn">
            <span ng-bind="registrant.reliability"></span>
        </td>
        <td ng-class="CD.challengeType == 'design' ? 'regDateColumnDesign' : 'regDateColumn'" ng-bind="registrant.registrationDate | formatDate:2"></td>
        <td ng-class="CD.challengeType == 'design' ? 'subDateColumnDesign' : 'subDateColumn'" ng-bind="registrant.submissionDate | formatDate:2"></td>
        <!--bugfix refactored-challenge-details-68: added missing icons -->
        <td class="successIconColumn">
          <i class="{{registrant.winner ? 'successIcon' : registrant.submissionStatus.match('Failed') ? 'failureIcon' : ''}}"
             title="{{registrant.winner ? 'Pass' : registrant.submissionStatus.match('Failed') ? 'Fail' : ''}}"></i>
        </td>
      </tr>
      </tbody>
    </table>
  </article>


</div>
<div id="winner" class="tableWrap {{CD.activeTab != 'results' ? 'hide' : ''}} tab">

  <?php include( locate_template('ng-page-challenge-result.php') ); ?>

</div>
<div id="checkpoints" class="tableWrap {{CD.activeTab == 'checkpoints' ? '' : 'hide'}} tab">


  <article>
    <?php include( locate_template('ng-content-checkpoint.php') ); ?>
  </article>

</div>
<div id="submissions" class="tableWrap {{activeTab != 'submissions' ? 'hide' : ''}} tab">


  <article>
    <?php include( locate_template('ng-content-submission.php') ); ?>
  </article>

</div>
</section>
</div>
<!-- /.mainStream -->

</div>
<!-- /.rightSplit -->
<aside class="sideStream grid-1-3" style="float: left;">

<div class="topRightTitle">
    <a ng-show="CD.isRegistered" ng-href="{{CD.challenge.forumLink}}" class="contestForumIcon" target="_blank">Challenge Discussion</a>
</div>

<div class="columnSideBar">

<div class="slider">
<ul>
  <div ng-hide="CD.isDesign" class="slideBox">
    <?php include locate_template('ng-content-challenge-downloads.php'); ?>
  </div>
  <li ng-show="CD.challenge.event" class="slide">
      <div class="contestLinks slideBox">
      <h3>Eligible Events:</h3>

      <div class="inner">
        <p><a ng-href="{{CD.challenge.event.url}}" target='_blank'>{{CD.challenge.event.description}}</a></p>
      </div>
    </div>
  </li>
  <li ng-hide="CD.isDesign" class="slide">

    <div class="reviewStyle slideBox">
      <h3>Review Style:</h3>

      <div class="inner">
        <p><strong>Final Review: </strong><span>Community Review Board</span>
          <a onmouseout="hideTooltip('FinalReview');" onmouseover="showTooltip(this, 'FinalReview');" class="tooltip"
             href="javascript:;"> </a></p>

        <p><strong>Approval: </strong><span>User Sign-Off</span>
          <a onmouseout="hideTooltip('Approval');" onmouseover="showTooltip(this, 'Approval');" class="tooltip"
             href="javascript:;"> </a>
        </p>
      </div>

    </div>
    <!-- End review style section -->

  </li>
  <li ng-show="CD.challenge.screeningScorecardId || (!CD.isDesign && CD.challenge.reviewScorecardId)" class="slide">

    <div class="contestLinks slideBox">
      <h3>Challenge Links:</h3>

      <div class="inner">
        <p ng-show="CD.challenge.screeningScorecardId"><a
            href="https://software.topcoder.com/review/actions/ViewScorecard.do?method=viewScorecard&scid={{CD.challenge.screeningScorecardId}}">Screening
            Scorecard</a></p>

        <p ng-show="!CD.isDesign && CD.challenge.reviewScorecardId"><a
            href="http://software.topcoder.com/review/actions/ViewScorecard.do?method=viewScorecard&scid={{CD.challenge.reviewScorecardId}}">Review
            Scorecard</a></p>
      </div>

    </div>

  </li>
  <li ng-hide="CD.isDesign" class="slide">

    <div class="umltoolLinks slideBox">
      <h3>Get the UML Tool:</h3>

      <div class="inner">
        <p><a href="https://github.com/topcoderinc/topcoder-UML-Tool">Github source code repository</a></p>
        <p><a href="https://github.com/topcoderinc/topcoder-UML-Tool/blob/master/build/dist/TopCoder%20UML%20Tool%20OS%20X%201.2.7.zip?raw=true">Mac disk image </a></p>
        <p><a href="https://github.com/topcoderinc/topcoder-UML-Tool/blob/master/build/dist/TopCoder_UML_Tool_Installer-1.2.7.jar?raw=true">Java installer</a></p>
      </div>

    </div>
    <!-- End review style section -->

  </li>

  <li ng-if="CD.isDesign" class="slide">
    <div class="forumFeed slideBox">&nbsp;<br/>
    </div>
  </li>
  <li ng-if="CD.isDesign" class="slide">
    <?php include locate_template('ng-content-challenge-downloads.php'); ?>
  </li>
  <li ng-if="CD.isDesign" class="slide">
    <div class="slideBox">
      <h3>How to Format Your Submission:</h3>

      <div class="inner">
        <ul>
          <b>Your Design Files:</b><br>
          <li>1. Look for instructions in this challenge regarding what files to provide.
          </li>
          <li>2. Place your submission files into a "Submission.zip" file.</li>
          <li>3. Place all of your source files into a "Source.zip" file.</li>
          <li>4. Create a JPG preview file.</li>
        </ul>

        <p>Trouble formatting your submission or want to learn more?
          <a href="http://topcoder.com/home/studio/the-process/how-to-submit-to-a-contest/">Read this FAQs</a>.</p>

        <!-- Bugfix I-111397: removed empty link tags surrounding text -->
        <p><strong>Fonts:</strong><br> All fonts within your design must be declared when you submit. DO NOT include any font files in your submission or source files.
        <a href="http://topcoder.com/home/studio/the-process/font-policy/" style="white-space:nowrap;">Read about the font policy here</a>.
        </p>

        <p><strong>Screening:</strong><br>All submissions are screened for eligibility before the challenge holder picks
          winners. Don't let your hard work go to waste.<br> <a
            href="http://community.topcoder.com/studio/the-process/screening/">Learn more about how to pass screening
            here</a>.
        </p>

        <p>Questions? <a href="//studio.topcoder.com/forums?module=ThreadList&amp;forumID=6">Ask in the Challenge Discussion Forums</a>.
        </p>

      </div>
    </div>
  </li>
  <li ng-if="CD.isDesign" class="slide">
    <div class="slideBox">
      <h3>Source Files:</h3>

      <div class="inner">
        <ul>
            <li ng-if="!hasFiletypes"><strong>Text or Word Document containing all of your ideas and supporting information.</strong></li>
            <li ng-if="hasFiletypes" ng-repeat="filetype in CD.challenge.filetypes">
              <strong ng-bind="filetype"></strong>
            </li>
        </ul>

        <p>You must include all source files with your submission. </p>
      </div>
    </div>
  </li>
  <li ng-if="CD.isDesign" class="slide">
    <div class="slideBox">
      <h3>Submission Limit:</h3>

      <div class="inner">
        <!-- Bugfix I-107615: Added check if SubmissionLimit is empty, if so, display "Unlimited" instead of empty value -->
        <p><strong ng-bind="CD.challenge.submissionLimit.length > 0 ? CD.challenge.submissionLimit : 'Unlimited'"></strong></p>
      </div>
    </div>
  </li>
<li class="slide">
  <div class="slideBox">
    <h3>Share:</h3>

    <div class="inner">
      <!-- AddThis Button BEGIN -->
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
        <a class="addthis_button_preferred_1"></a>
        <a class="addthis_button_preferred_2"></a>
        <a class="addthis_button_preferred_3"></a>
        <a class="addthis_button_preferred_4"></a>
        <a class="addthis_button_compact"></a>
        <a class="addthis_counter addthis_bubble_style"></a>
      </div>
      <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};
        var addthis_share = { url: location.href, title: 'Topcoder Challenge' }</script>
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52f22306211cecfc"></script>
      <!-- AddThis Button END -->
    </div>
  </div>
</li>
</ul>
</div>

</div>

</aside>
<!-- /.sideStream -->
<div class="clear"></div>
</div>
<!-- /.container -->
</article>
<!-- /#mainContent -->


<div onmouseout="hideTooltip('FinalReview')" onmouseover="enterTooltip('FinalReview')"
     class="tip reviewStyleTip tipFinalReview" style="display: none;">
  <div class="inner">
    <div class="tipHeader">
      <h2>Final Review</h2>
    </div>
    <div class="tipBody">
    <!--Bugfix refactored-challenge-details-117: Removed unused hyperlink-->
    Community Review Board performs a thorough review based on scorecards.
    </div>
    <div class="corner tl"></div>
    <div class="corner tr"></div>
    <div class="corner bl"></div>
    <div class="corner br"></div>
  </div>
  <div class="shadow"></div>
</div>

<div onmouseout="hideTooltip('Approval')" onmouseover="enterTooltip('Approval')" class="tip reviewStyleTip tipApproval"
     style="display: none;">
  <div class="inner">
    <div class="tipHeader">
      <h2>Approval</h2>
    </div>
    <div class="tipBody">
      Customer has final opportunity to sign-off on the delivered assets.
    </div>
    <div class="corner tl"></div>
    <div class="corner tr"></div>
    <div class="corner bl"></div>
    <div class="corner br"></div>
  </div>
  <div class="shadow"></div>
</div>

<script type="text/ng-template" id="lc-discussion.html">

  <!-- template for tc-discussion directive -->
  <style>
    .message-box, .panel-title, .comment-box {
      font-size: 12px;
    }
    .created-at {
      font-weight: 400;
      color: #555;
    }
    .message-pane {
      padding: 10pxx;
      display:block;
    }
    .message-textarea {
      background-color: #fafafa;
      padding: 7px 8px;
      overflow: auto;
      border: 1px solid #ccc;
      border-radius: 3px;
      width: 100%;
      height: 100px;
      margin: 0;
      max-width: 100%;
      min-height: 100px;
    }
    .comment-button {
      margin: 6px 0;
    }

    img.message-avatar {
      float: left;
      margin-right: 10px;
      margin-bottom: 10px;
    }

    p.message-text {
      display: block;
      margin-bottom: 20px;
    }

    .created-at {
      font-weight: 400;
      color: #228400;
    }

    .message-author {
      font-weight: 600;
    }

    .message-box {
      font-size: 12px;
      display: block;
      min-height: 50px;
    }

  </style>

  <div class="discussion" data-ng-show="booted">
    <div class="message-box ng-scope" data-ng-repeat="message in messages">
      <a href="#"><img class="message-avatar" data-ng-src="{{users[message.authorId].avatarUrl}}" width="45" height="45"></a>
      <span class="created-at ng-binding"><a data-ng-href="/member-profile/{{users[message.authorId].handle}}"><em class="ng-binding message-author">{{users[message.authorId].handle}}</em></a> commented at {{message.createdAt | date: "MMMM d, yyyy h:mm a"}}</span>
      <p class="message-text">{{message.content}}</p>
    </div>

    <div class="row">
      <div class="col-sm-offset-1 col-sm-8 col-md-offset-1 col-md-8">
        <div class="row comment-box">
          <div class="tab-content">
            <div class="tab-pane active message-pane" id="home">
              <textarea class="message-textarea" name="comment" data-ng-model="comment" rows="3" placeholder="Leave a comment"></textarea>
              <a href="#" class="btn btn-success pull-right comment-button" data-ng-click="addComment()">Comment</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</script>
<?php get_footer('challenge-detail-tooltipx'); ?>
