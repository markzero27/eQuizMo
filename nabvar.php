<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">e-Quizmo</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="accordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Monitors">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMonitors" data-parent="#accordion">
            <i class="fa fa-fw fa-television"></i>
            <span class="nav-link-text">Monitor Screens</span>
          </a>

          <ul class="sidenav-second-level collapse" id="collapseMonitors">
              
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Question Monitor">
                <a class="nav-link" href="display_screen.php" target="_blank">
                    <i class="fa fa-fw fa-tv"></i>
                    <span class="nav-link-text">Question Screen</span>
                </a>
            </li> 
              
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Scoreboard">
                <a class="nav-link" href="scoreboard.php"  target="_blank">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Score Board</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Scoreboard">
                <a class="nav-link" href="scoreboard.php?diff=Hard&Tiebreaker=1"  target="_blank">
                    <i class="fa fa-fw fa-indent"></i>
                    <span class="nav-link-text">Tie-Breaker Board</span>
                </a>
            </li>
          
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Leaderboard">
              <a class="nav-link" href="leader-board-result.php?msg=Total"  target="_blank">
                <i class="fa fa-fw fa-trophy"></i>
                <span class="nav-link-text">Leader Board</span>
              </a>
            </li>
              
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="correct-groups">
              <a class="nav-link" href="correct-groups.php"  target="_blank">
                <i class="fa fa-fw fa-font"></i>
                <span class="nav-link-text">Answer Screen</span>
              </a>
            </li>
              
          </ul>
        </li>
 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Questions">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseQuestion" data-parent="#accordion">
            <i class="fa fa-fw fa-question"></i>
            <span class="nav-link-text">Question Select</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseQuestion">
            <li>
              <a href="question-select.php?type=Multiple Choice">Multiple Choice Questions</a>
            </li>
            <li>
              <a href="question-select.php?type=Short Answer">Short Answer Question</a>
            </li>
          </ul>
        </li>
          
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Database">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConfig" data-parent="#accordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Administration</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseConfig">
            <li><a href="categories.php">Category</a> </li>
            <li><a href="questions.php">Question</a></li>
            <li><a href="registered-users.php">Accounts</a></li>
            <li><a href="register.php">Registration</a></li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Result">
          <a class="nav-link" href="quiz-results.php">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Quiz Results</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Result">
          <a class="nav-link" href="predictive-analytics.php">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">Predictive Analytics</span>
          </a>
        </li>
          
        <li class="nav-item"  data-toggle="modal" data-target="#exampleModal" title="Logout" data-placement="right">
            <a class="nav-link">
                <i class="fa fa-fw fa-sign-out"></i>
                <span class="nav-link-text">Logout</span>
            </a>
          </li>
      </ul>
    
    
    

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
        
    </div>
  </nav>  
   