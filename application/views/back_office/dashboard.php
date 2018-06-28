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
                    <div class="text-muted mb-4">New Series</div>
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
                        <div class="text-muted mb-4">Series Assigned Today</div>
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
                        <div class="text-muted mb-4">Files Import</div>
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
                        <div class="h1 m-0">2.5K</div>
                        <div class="text-muted mb-4">New Numbers</div>
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
                        <div class="h1 m-0">5.4k</div>
                        <div class="text-muted mb-4">Numbers from Imports</div>
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
                        <div class="h1 m-0">3k</div>
                        <div class="text-muted mb-4">Valid Numbers</div>
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
                    <h3 class="card-title">Series Assigned/Unassigned</h3>
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
                    <h3 class="card-title">Generate Comparison</h3>
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
                  				],
                  				type: 'line', // default type of chart
                  				colors: {
                  					'data1': '#fd9644',
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'Leads',
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
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table" style="min-height:150px;">
                      <thead>
                        <tr>
                          <th class="text-center w-1"><i class="icon-people"></i></th>
                          <th>CSR</th>
                          <th class="text-center">Leads</th>
                          <th>Activity</th>
                          <th class="text-center">Completion</th>
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
                          <?php /*?><td class="text-center">
                            <div class="item-action dropdown">
                              <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Send Message </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-phone-call"></i> Call </a>
                              </div>
                            </div>
                          </td><?php */?>
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
                        <div class="text-muted">Valid Numbers</div>
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
                        <div class="text-muted">Invalid Numbers</div>
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
                        <div class="text-muted">CSR Lead Update</div>
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
                    <h3 class="card-title">Available Series</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">SR. NO.</th>
                          <th>TOTAL NUMBERS</th>
                          <th>START NUMBER</th>
                          <th>END NUMBER</th>
                          <th>DATE ADDED</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="text-muted">1</span></td>
                          <td>2</td>
                          <td>0552020202</td>
                          <td>0552020203</td>
                          <td>15 Dec 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash-2"></i> Delete </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-3"></i> Update</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>95</td>
                          <td>0505592707</td>
                          <td>0505592800</td>
                          <td>12 Apr 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash-2"></i> Delete </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-3"></i> Update</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="text-muted">3</span></td>
                          <td>23</td>
                          <td>0512345678</td>
                          <td>0512345700</td>
                          <td>23 Oct 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash-2"></i> Delete </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-3"></i> Update</a>
                              </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>2</td>
                          <td>0551212121</td>
                          <td>0551212122</td>
                          <td>2 Sep 2017</td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                              <div class="item-action dropdown">
                              <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash-2"></i> Delete </a>
                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-3"></i> Update</a>
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
      
      
      
      
      
      