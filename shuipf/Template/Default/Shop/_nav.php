<div class="layout-hd <eq name="page[setting][header][isshownav]" value="0">hdhidenav</eq> " style="margin-bottom: <eq name="page[setting][header][margin_bottom_10]" value="0">0px <else/>10px</eq>; <eq name="page[setting][header][isshowhead]" value="0">display:none;</eq>    <notempty name="page[setting][header][background_image]">background-image: url({$page['setting']['header']['background_image']});background-repeat:{$page['setting']['header']['background_repeat']}; background-position:{$page['setting']['header']['background_align']} 0;</notempty> <notempty name="page[setting][header][background_color]">background-color:{$page['setting']['header']['background_color']};</notempty>   ">
        <div class="layout layout-block" data-ltype="ltop" data-widgetid="12346745822" data-componentid="23" data-prototypeid="23" data-id="12346745822" data-max="2">
          <div class="col-main">
            <div class="main-wrap J_TRegion" data-modules="main" data-width="h950" data-max="2">
              
              <volist name="layout[hd][0][maincol]" id="v">
                {$v['widgetid']|getDesignHtml}
              </volist>
            </div>

          </div>

        </div>

      </div>