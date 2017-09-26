 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{ route('dashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>HOME</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>STUDENTS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('students') }}">All Students</a></li>
                          <li><a class="" href="{{ route('addstudent') }}"><span>Add Students</span></a></li>                         
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>CLASSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('classes') }}">All Classes</a></li>
                          <li><a class="" href="{{ route('addclass') }}"><span>Add Class</span></a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_genius"></i>
                          <span>COURSES</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('courses') }}">All Courses</a></li>
                          <li><a class="" href="{{ route('addcourse') }}"><span>Add Course</span></a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">                     
                      <a href="javascript:;" class="">
                          <i class="icon_piechart"></i>
                          <span>TEACHERS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('teachers') }}">All Teachers</a></li>
                          <li><a class="" href="{{ route('addteacher') }}"><span>Add Teacher</span></a></li>
                      </ul>
                                         
                  </li>
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>PARENTS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('parents') }}">All Parents</a></li>
                          <li><a class="" href="{{ route('addparent') }}"><span>Add Parent</span></a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>EXAMS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{ route('exams') }}">All Exams</a></li>
                          <li><a class="" href="{{ route('addexam') }}"><span>Add Exam</span></a></li>
                           <li><a class="" href="{{ route('examresults') }}"><span>Exam Results</span></a></li>
                      </ul>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>ADMINS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{ route('admins') }}">All Admins</a></li>
                          <li><a class="" href="{{ route('addadmin') }}"><span>Add Admin</span></a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->