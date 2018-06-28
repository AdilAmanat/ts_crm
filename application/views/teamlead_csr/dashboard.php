<div class="page">
  <div class="page-main">
      <div class="page-content">
          <div class="container">
            <div class="row row-cards row-deck">
                <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      6%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">43</div>
                    <div class="text-muted mb-4">New Lead</div>
                  </div>
                </div>
              </div>
                  <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                      <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                          -3%
                          <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">17</div>
                        <div class="text-muted mb-4">Closed Today</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                      <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                          9%
                          <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">7</div>
                        <div class="text-muted mb-4">New Replies</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                      <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                          3%
                          <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">7.3K</div>
                        <div class="text-muted mb-4">Package</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                      <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                          -2%
                          <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">95</div>
                        <div class="text-muted mb-4">TSA Lead Update</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 col-lg-2">
                    <div class="card">
                      <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                          -1%
                          <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">621</div>
                        <div class="text-muted mb-4">Lead Processed Today</div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row row-cards">
      <div class="col-lg-6 col-xl-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo date("F") ." report"?></h3>
                  </div>
                  <div class="card-body">
                    <div id="chart-pie" style="height: 16rem"></div>
                  </div>
                </div>
                <script>
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-pie', // id of chart wrapper
                  			data: {
                  				columns: [
                  				    // each columns data
                  					['data1', 63],
                  					['data2', 44],
                  					['data3', 12],
                  					['data4', 14]
                  				],
                  				type: 'pie', // default type of chart
                  				colors: {
                  					'data1': '#1c3353',
                  					'data2': '#467fcf',
                  					'data3': '#7ea5dd',
                  					'data4': '#c8d9f1'
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'A',
                  					'data2': 'B',
                  					'data3': 'C',
                  					'data4': 'D'
                  				}
                  			},
                  			axis: {
                  			},
                  			legend: {
                                  show: false, //hide legend
                  			},
                  			padding: {
                  				bottom: 0,
                  				top: 0
                  			},
                  		});
                  	});
                </script>
              </div>
              <div class="col-lg-6 col-xl-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Lead Open/Closed</h3>
                  </div>
                  <div class="card-body">
                    <div id="chart-donut" style="height: 16rem"></div>
                  </div>
                </div>
                <script>
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-donut', // id of chart wrapper
                  			data: {
                  				columns: [
                  				    // each columns data
                  					['data1', 63],
                  					['data2', 37]
                  				],
                  				type: 'donut', // default type of chart
                  				colors: {
                  					'data1': "#5eba00",
                  					'data2': "#8ecf4d"
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'Maximum',
                  					'data2': 'Minimum'
                  				}
                  			},
                  			axis: {
                  			},
                  			legend: {
                                  show: false, //hide legend
                  			},
                  			padding: {
                  				bottom: 0,
                  				top: 0
                  			},
                  		});
                  	});
                </script>
              </div>
              <div class="col-lg-6 col-xl-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Lead Comparison</h3>
                  </div>
                  <div class="card-body">
                    <div id="chart-employment" style="height: 16rem"></div>
                  </div>
                </div>
                <script>
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-employment', // id of chart wrapper
                  			data: {
                  				columns: [
                  				    // each columns data
                  					['data1', 2, 8, 6, 7, 14, 11],
                  					['data2', 5, 15, 11, 15, 21, 25],
                  					['data3', 17, 18, 21, 20, 30, 29],
									['data4', 19, 13, 25, 24, 28, 25],
									['data5', 15, 19, 20, 22, 22, 27]
                  				],
                  				type: 'line', // default type of chart
                  				colors: {
                  					'data1': '#fd9644',
                  					'data2': '#467fcf',
                  					'data3': "#5eba00",
									'data4': "#6574cd",
									'data5': "#2bcbba"
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'Atif',
                  					'data2': 'Saleem',
                  					'data3': 'Zahid',
									'data4': 'Rizam',
									'data5': 'Waqas'
                  				}
                  			},
                  			axis: {
                  				x: {
                  					type: 'category',
                  					// name of each category
                  					categories: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr']
                  				},
                  			},
                  			legend: {
                                  show: false, //hide legend
                  			},
                  			padding: {
                  				bottom: 0,
                  				top: 0
                  			},
                  		});
                  	});
                </script>
              </div>
            </div>
            <div class="row row-cards row-deck">
              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                      <thead>
                        <tr>
                          <th class="text-center w-1"><i class="icon-people"></i></th>
                          <th>TSA</th>
                          <th class="text-center">Leads</th>
                          <th>Activity</th>
                          <th class="text-center">Completion</th>
                          <th class="text-center"><i class="icon-settings"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/26.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Saleem</div>
                            <div class="small text-muted">
                              Registered: Feb 27, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>42%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-yellow" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>4 minutes ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.42" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">42%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/17.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Zahid</div>
                            <div class="small text-muted">
                              Registered: Feb 11, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>0%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-red" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>5 minutes ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.0" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">0%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/21.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Waqas</div>
                            <div class="small text-muted">
                              Registered: Mar 18, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>96%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-green" role="progressbar" style="width: 96%" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>a minute ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.96" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">96%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/male/32.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Sabaa</div>
                            <div class="small text-muted">
                              Registered: Dec 26, 2017
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>6%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-red" role="progressbar" style="width: 6%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>a minute ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.06" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">6%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/12.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Saman</div>
                            <div class="small text-muted">
                              Registered: Feb 13, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>36%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-red" role="progressbar" style="width: 36%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>2 minutes ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.36" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">36%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/4.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Nidaa</div>
                            <div class="small text-muted">
                              Registered: Feb 28, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>7%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-red" role="progressbar" style="width: 7%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>a minute ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.07" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">7%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/female/27.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Yusra</div>
                            <div class="small text-muted">
                              Registered: Feb 2, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>80%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-green" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>9 minutes ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.8" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">80%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar d-block" style="background-image: url(demo/faces/male/20.jpg)">
                              <span class="avatar-status bg-green"></span>
                            </div>
                          </td>
                          <td>
                            <div>Sehrish</div>
                            <div class="small text-muted">
                              Registered: Jan 2, 2018
                            </div>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong>83%</strong>
                              </div>
                              <div class="float-right">
                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-green" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-muted">Last login</div>
                            <div>8 minutes ago</div>
                          </td>
                          <td class="text-center">
                            <div class="mx-auto chart-circle chart-circle-xs" data-value="0.83" data-thickness="3" data-color="blue"><canvas width="40" height="40"></canvas>
                              <div class="chart-circle-value">83%</div>
                            </div>
                          </td>
                          <td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php /*?><div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Kioks Stats</h4>
                  </div>
                  <table class="table card-table">
                    <tbody><tr>
                      <td width="1"><i class="fa fa-users text-muted"></i></td>
                      <td>Safeer Mall</td>
                      <td class="text-right"><span class="text-muted">23%</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-users text-muted"></i></td>
                      <td>24 Hyper Market Sharjah</td>
                      <td class="text-right"><span class="text-muted">15%</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-users text-muted"></i></td>
                      <td>City Mart Ajman</td>
                      <td class="text-right"><span class="text-muted">7%</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-users text-muted"></i></td>
                      <td>Manama</td>
                      <td class="text-right"><span class="text-muted">9%</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-users text-muted"></i></td>
                      <td>Tasheel Mall</td>
                      <td class="text-right"><span class="text-muted">23%</span></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-users text-muted"></i></td>
                      <td>Souq Al Mubarak</td>
                      <td class="text-right"><span class="text-muted">9%</span></td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h2 class="card-title">Call Centers</h2>
                  </div>
                  <table class="table card-table">
                    <tbody><tr>
                      <td>Dubai Call Center</td>
                      <td class="text-right">
                        <span class="badge badge-info">65%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Rawalpindi Call Centre</td>
                      <td class="text-right">
                        <span class="badge badge-success">80%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Islamabad Call Centre</td>
                      <td class="text-right">
                        <span class="badge badge-danger">30%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Cairo Call Centre</td>
                      <td class="text-right">
                        <span class="badge badge-warning">40%</span>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Team Members</h3>
                  </div>
                  <div class="card-body o-auto" style="height: 15rem">
                    <ul class="list-unstyled list-separated">
                      <li class="list-separated-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/12.jpg)"></span>
                          </div>
                          <div class="col">
                            <div>
                              <a href="javascript:void(0)" class="text-inherit">Waqas</a>
                            </div>
                            <small class="d-block item-except text-sm text-muted h-1x">waqas@alwafiq.com</small>
                          </div>
                          <div class="col-auto">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-separated-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/21.jpg)"></span>
                          </div>
                          <div class="col">
                            <div>
                              <a href="javascript:void(0)" class="text-inherit">Ali Jahanzaib</a>
                            </div>
                            <small class="d-block item-except text-sm text-muted h-1x">ali.jahanzaib@alwafiq.com</small>
                          </div>
                          <div class="col-auto">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-separated-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/29.jpg)"></span>
                          </div>
                          <div class="col">
                            <div>
                              <a href="javascript:void(0)" class="text-inherit">Omar Farooq</a>
                            </div>
                            <small class="d-block item-except text-sm text-muted h-1x">omar.farooq@alwafiq.com</small>
                          </div>
                          <div class="col-auto">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-separated-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/2.jpg)"></span>
                          </div>
                          <div class="col">
                            <div>
                              <a href="javascript:void(0)" class="text-inherit">Shabbir Ahmed</a>
                            </div>
                            <small class="d-block item-except text-sm text-muted h-1x">shabbir.ahmed@alwafiq.com</small>
                          </div>
                          <div class="col-auto">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-separated-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/male/34.jpg)"></span>
                          </div>
                          <div class="col">
                            <div>
                              <a href="javascript:void(0)" class="text-inherit">Umar Hayat</a>
                            </div>
                            <small class="d-block item-except text-sm text-muted h-1x">umar.hayat@alwafiq.com</small>
                          </div>
                          <div class="col-auto">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-separated-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="avatar avatar-md d-block" style="background-image: url(demo/faces/female/11.jpg)"></span>
                          </div>
                          <div class="col">
                            <div>
                              <a href="javascript:void(0)" class="text-inherit">Yousaf Lodhi</a>
                            </div>
                            <small class="d-block item-except text-sm text-muted h-1x">yousaf.lodhi@alwafiq.com</small>
                          </div>
                          <div class="col-auto">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Reports</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div><?php */?>
              <div class="col-md-6 col-lg-12">
                <div class="row">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value pull-right text-blue">+5%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">New Leads</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-1" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-1',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Lead Generation'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#467fcf']
                      			}
                      		});
                      	});
                    </script>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value pull-right text-red">-3%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">CSR Lead Closed</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-2" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-2',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Lead Generation'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#e74c3c']
                      			}
                      		});
                      	});
                    </script>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value pull-right text-green">-3%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">Lead Generation</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-3" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-3',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Lead Generation'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#5eba00']
                      			}
                      		});
                      	});
                    </script>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-value pull-right text-yellow">9%</div>
                        <h3 class="mb-1">423</h3>
                        <div class="text-muted">TSA Lead Update</div>
                      </div>
                      <div class="card-chart-bg">
                        <div id="chart-bg-users-4" style="height: 100%"></div>
                      </div>
                    </div>
                    <script>
                      	$(document).ready(function() {
                      		var chart = c3.generate({
                      			bindto: '#chart-bg-users-4',
                      			padding: {
                      				bottom: -10,
                      				left: -1,
                      				right: -1
                      			},
                      			data: {
                      				names: {
                      					data1: 'Lead Generation'
                      				},
                      				columns: [
                      					['data1', 30, 40, 10, 40, 12, 22, 40]
                      				],
                      				type: 'area'
                      			},
                      			legend: {
                      				show: false
                      			},
                      			transition: {
                      				duration: 0
                      			},
                      			point: {
                      				show: false
                      			},
                      			tooltip: {
                      				format: {
                      					title: function (x) {
                      						return '';
                      					}
                      				}
                      			},
                      			axis: {
                      				y: {
                      					padding: {
                      						bottom: 0,
                      					},
                      					show: false,
                      					tick: {
                      						outer: false
                      					}
                      				},
                      				x: {
                      					padding: {
                      						left: 0,
                      						right: 0
                      					},
                      					show: false
                      				}
                      			},
                      			color: {
                      				pattern: ['#f1c40f']
                      			}
                      		});
                      	});
                    </script>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Recent DSR History</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">Ref. No.</th>
                          <th>Package Plan</th>
                          <th>Lead Owner</th>
                          <th>Teamlead</th>
                          <th>Call Center</th>
                          <th>Close Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="text-muted">1</span>00</td>
                          <td>Smart Plan 150</td>
                          <td>Atif Naeem</td>
                          <td>Ali Jahanzaib</td>
                          <td>Karachi Call Centre</td>
                          <td>15 Dec 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> View </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Comment</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>101</td>
                          <td>Smart Plan 450</td>
                          <td>Rizam Hamza</td>
                          <td>Omar Farooq</td>
                          <td>Cairo Call Centre</td>
                          <td>12 Apr 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> View </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Comment</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="text-muted">110</span></td>
                          <td>Emarati Plan 450</td>
                          <td>Saleem Ismail</td>
                          <td>Umar Hayat</td>
                          <td>Rawalpindi Call Centre</td>
                          <td>23 Oct 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> View </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Comment</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>125</td>
                          <td>Smart Plan 1000</td>
                          <td>Saba</td>
                          <td>Abdul Mannan</td>
                          <td>Rawalpindi Call Centre</td>
                          <td>2 Sep 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                               <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> View </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Comment</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>130</td>
                          <td>Emarati Plan 150</td>
                          <td>Saman</td>
                          <td>Shabbir Ahmed</td>
                          <td>Karachi Call Centre</td>
                          <td>29 Jan 2018</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> View </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Comment</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>139</td>
                          <td>Emarati Plan 450</td>
                          <td>Nida</td>
                          <td>Omar Farooq</td>
                          <td>Karachi Call Centre</td>
                          <td>4 Feb 2018</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> View </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-book"></i> Comment</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
      
      
      
      
      
      