
<div ng-app="app" ng-controller="climaCtrl">
    
    <div class="container" ng-class="infoclima.imagemclass">
            <div class="boxtempo" ng-class="infoclima.backcolor">
                 
                
                 
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;">
  
                  <div style="padding:30px 0;color:#FFF;">   
                    <p class="text-center" id="momento-data">
                    {{infoclima.data}}
                    </p>
                    
                    <div class="clearfix"></div>
                    <div ng-show="showtemperatura">
                        
                   
                     <h4 class="text-center" id="momento-localidade" style="display:block">
                         <span class="glyphicon glyphicon-send"></span> {{infoclima.cidade}}</h4>

                      <h2 class="text-center" id="momento-localidade" style="display:block">
                      {{infoclima.temperatura}}   
                      </h2>   
                  </div>
                    <div ng-hide="showtemperatura" style="text-align: center;padding-top: 20px;">
                        <img src="<?php echo plugins_url('wdclima/assets/image/loading.gif'); ?>" width="80"/>
                    </div>
<br/>
</div>
                     <div class="clearfix"></div>
                     <ul class="dias-tempo">
                        
                         <li class="list-tempo" ng-repeat="dias in infoclima.days">
                            <strong>{{dias.date}}</strong>
                            <div class="wd-min">
                            <span class="glyphicon glyphicon-arrow-up" ></span>{{dias.high}}
                            </div>
                            <div class="diviroria"></div>
                            <div class="wd-max">
                                 <span class="glyphicon glyphicon-arrow-down" ></span> {{dias.low}}
                            </div>
                        </li>   
                       
                     </ul>
                                                         
                  </div>
 
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" ng-click="opencidade()" style="background: #FFF;padding: 8px 0;cursor: pointer;">
            <strong class="">Outras cidades</strong>  
        </div>
          
        <div style="float: left;background: #FFF;width: 100%;padding: 10px 0;" ng-show="showcidades">
               
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <strong>Selecione sua cidade</strong>  
                    </div>
                </div>
                    <div class="col-xs-12 col-sm-12">
                          <div class="form-group">
                               <select name="" id="input1" class="form-control" ng-model="estado" required="required" ng-change="get_cidades()">
                                <option value="" ng-repeat="(k , v) in cites" ng-value="v">{{k}}</option>
                            </select>
                        </div>
                            
                        </div>

                        <div class="col-xs-12 col-sm-12" >
                              <div class="form-group" style="position: relative;">
                              <input type="text" ng-keyup="pesquisar(search)" ng-model="search" class="form-control" placeholder="Cidade" autofocus autocomplete="off">

                               <ul class="list-group autocomplete" ng-show="completing">
                                   <li class="list-group-item" ng-repeat="e in estado | filter: {name: search}" ng-click="selected_cidade(e)">
                                       {{e.name}}
                                   </li>                                      
                                </ul>
                                        
                        </div>
                            
                        </div>
                     </div>
                 
        </div>
    
</div>