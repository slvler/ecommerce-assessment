
@foreach($sidebarDinamic as $menu)

    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
													<rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
													<rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{ $menu->title }}</span>
										<span class="menu-arrow"></span>
									</span>
                                    <div class="menu-sub menu-sub-accordion">

                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route($menu->url_adress) }}">
                                                                                <span class="menu-bullet">
                                                                                    <span class="bullet bullet-dot"></span>
                                                                                </span>
                                                <span class="menu-title">Listeleme Sayfası</span>
                                            </a>
                                        </div>

                                    </div>
                            </div>

@endforeach
