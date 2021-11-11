 <div id="language-popup" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" data-source="2">
               <div class="modal-dialog fadeIn animated" style="width: 350px; margin: 0 calc((100% - 350px) / 2);">
                  <div class="modal-content">
                     <div class="modal-header">
                        <span class="language-close" title="Close" data-dismiss="modal" aria-hidden="true"><i class="demo-icon icon-cancel-2"></i></span>
                     </div>
                     <div class="modal-body">
                        <div class="language-inner source-2">
                           <div class="currency-position">
                              <h4>Currencies</h4>
                              <div class="currency-wrapper type-code">
                                 <a class="currency_wrapper" href="javascript:;">
                                 <span class="currency_code">
                                 <i class="currency-flag currency-flag-usd"></i>
                                 <span class="c-code">USD</span>
                                 <span class="c-name">US dollar (USD)</span>
                                 </span>
                                 <span class="expand"><i class="demo-icon icon-angle-down"></i></span>
                                 </a>
                                 <ul class="currencies currencies-dropdown">
                                    <li class="currency-USD">
                                       <a href="javascript:;">
                                       <i class="currency-flag currency-flag-usd"></i>
                                       <span class="c-code">USD</span>
                                       <span class="c-name">US dollar (USD)</span>
                                       </a>
                                       <input type="hidden" class="hidden-currency-code" value="USD" />
                                       <input type="hidden" class="hidden-currency-name" value="US dollar (USD)" />
                                    </li>
                                    <li class="currency-EUR">
                                       <a href="javascript:;">
                                       <i class="currency-flag currency-flag-eur"></i>
                                       <span class="c-code">EUR</span>
                                       <span class="c-name">Euro (EUR)</span>
                                       </a>
                                       <input type="hidden" class="hidden-currency-code" value="EUR" />
                                       <input type="hidden" class="hidden-currency-name" value="Euro (EUR)" />
                                    </li>
                                    <li class="currency-CAD">
                                       <a href="javascript:;">
                                       <i class="currency-flag currency-flag-cad"></i>
                                       <span class="c-code">CAD</span>
                                       <span class="c-name">Canadian dollar (CAD)</span>
                                       </a>
                                       <input type="hidden" class="hidden-currency-code" value="CAD" />
                                       <input type="hidden" class="hidden-currency-name" value="Canadian dollar (CAD)" />
                                    </li>
                                    <li class="currency-GBP">
                                       <a href="javascript:;">
                                       <i class="currency-flag currency-flag-gbp"></i>
                                       <span class="c-code">GBP</span>
                                       <span class="c-name">British pound (GBP)</span>
                                       </a>
                                       <input type="hidden" class="hidden-currency-code" value="GBP" />
                                       <input type="hidden" class="hidden-currency-name" value="British pound (GBP)" />
                                    </li>
                                 </ul>
                              </div>
                              <select class="currencies_src hide" name="currencies">
                                 <option value="USD" selected="selected">USD</option>
                                 <option value="EUR">EUR</option>
                                 <option value="CAD">CAD</option>
                                 <option value="GBP">GBP</option>
                              </select>
                           </div>
                           <div class="translate-position">
                              <h4>Languages</h4>
                              <form method="post" action="/localization" id="localization_form" accept-charset="UTF-8" class="selectors-form" enctype="multipart/form-data" data-disclosure-form="">
                                 <input type="hidden" name="form_type" value="localization" /><input type="hidden" name="utf8" value="✓" /><input type="hidden" name="_method" value="put" /><input type="hidden" name="return_to" value="/" />
                                 <input type="hidden" class="lang_to" name="lang_to" value="https://electro-theme-2019.myshopify.com" />
                                 <div class="selectors-form__item">
                                    <div class="disclosure" data-disclosure-locale>
                                       <a class="disclosure_wrapper" href="javascript:;">
                                       <span class="disclosure_code">English</span>
                                       <span class="expand"><i class="demo-icon icon-angle-down"></i></span>
                                       </a>
                                       <ul id="lang-list" class="disclosure-list" data-disclosure-list>
                                          <li class="disclosure-list__item ">
                                             <span class="disclosure-list__option" lang="ar"  data-value="ar" data-disclosure-option>
                                             Arabic
                                             </span>
                                          </li>
                                          <li class="disclosure-list__item disclosure-list__item--current">
                                             <span class="disclosure-list__option disclosure-list__item--primary" lang="en" aria-current="true" data-value="en" data-disclosure-option>
                                             English
                                             </span>
                                          </li>
                                          <li class="disclosure-list__item ">
                                             <span class="disclosure-list__option" lang="pt-PT"  data-value="pt-PT" data-disclosure-option>
                                             Portuguese (Portugal)
                                             </span>
                                          </li>
                                       </ul>
                                       <input type="hidden" name="locale_code" id="LocaleSelector" value="en" data-disclosure-input />
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>