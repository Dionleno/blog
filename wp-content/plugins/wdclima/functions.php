<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'vendor/autoload.php';

use AdinanCenci\Climatempo\Climatempo;


add_action('wp_ajax_show_clima_tempo', 'fn_show_clima_tempo');
add_action('wp_ajax_show_clima_tempo', 'fn_show_clima_tempo');

function fn_show_clima_tempo() {
    date_default_timezone_set('America/Sao_Paulo');
    $diasemana = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab');
    $mesesano = array('', 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez');

    
        if(date("H") > 6 && date("H") < 18){
           $imagemclass = 'wddiaimage';
           $backgroundcolor = 'wddiabgcolor';
        }else{
           $imagemclass = 'wdnoiteimage';
           $backgroundcolor = 'wdnoitebgcolor';
        }
    
    $response = array();
    
    $ids = isset($_REQUEST['idcidade']) ? array($_REQUEST['idcidade']) : array('558');

    $climatempo = new Climatempo($ids);
    $previsao = $climatempo->fetch();
    
    foreach ($previsao as $nomeDaCidade => $diasDaSemana) { 
     
     $diasemana_numero = date('w', $diasDaSemana[0]['date']);
     $mes_numero = date('n', $diasDaSemana[0]['date']);
     $response['cidade'] = $nomeDaCidade;
     $response['imagemclass'] = $imagemclass;
     $response['backcolor'] = $backgroundcolor;
     
     $response['data'] = $diasemana[$diasemana_numero].' ,'.date('d', $diasDaSemana[0]['date']).' '. $mesesano[$mes_numero].' '.date('Y', $diasDaSemana[0]['date']);
     $response['temperatura'] = $diasDaSemana[0]['high'].' °C';
        for($x=1;$x <= 3;$x++){
            $response['days'][$x]['date'] = date('d/m', $diasDaSemana[$x]['date']);  
            $response['days'][$x]['high'] = $diasDaSemana[$x]['high'].'°C';
            $response['days'][$x]['low'] = $diasDaSemana[$x]['low'].'°C';
        }
                          
    }
     
    wp_send_json_success($response, 200);    
    
}

function fn_clima_template( $atts ) {
	$atts = shortcode_atts( array(
		'page' => '',
		'directory' => 'templates/html/'                
	), $atts, 'fn_clima_template' );
   
       
  ?>
      
<div class="clearfix"></div>
      
<div ng-app="clima" ng-controller="climaCtrl" ng-cloak>
    
    <div class="conta" ng-class="infoclima.imagemclass">
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
      
      
      <div class="clearfix"></div>
      <?php
               
}
add_shortcode( 'dclima_template', 'fn_clima_template' );
