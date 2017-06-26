<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Template 
{
	public static $pdfTemplateDefault ='<style>*{margin: 0 auto;padding: 0px;}</style><page>
	<div style="background-color:#f36a22; width:1295px; height:840px; ">
	<div style="width:1295px;position:relative; height:200px; top:0; background-color:#000;">
	  <div style="position:absolute; left:30px; top:40px; width:482px; height:129px;">  </div>
	  <div style="position:absolute; right:60px; top:15px;"> <span style="font-size:160px; font-family:oswald_light; color:#fff; text-align:right; text-transform:uppercase;  letter-spacing:20px;">##TITLE##</span> </div>
	</div>
	<div style="position:relative; left:-2px; top:-2px;  height:270px;   width:1295px;">
	  <table>
	    <tr>
	      <td><table cellpadding="0" cellspacing="0" width="100%" border="0">
	           <tr>
	            <td style="height:270px; width:432px; background-color:#000;color:#fff;">##DESCRIPTION_1##</td>
	            <td style="height:270px; width:432px; background-color:#000;color:#fff;">##DESCRIPTION_2##</td>
	            <td style="height:270px; width:432px; background-color:#000;color:#fff;">##DESCRIPTION_3##</td>
	          </tr>
	        </table></td>
	    </tr>
	  </table>
	</div>
	<div style="width:1295px; position:relative; height:369px; background-color:#f36a22;  top:0;">        
	       <div style="position:absolute; left:0; bottom:0; width:220px; height:302px;"> </div>
	       <div style="width:500px; position:absolute; left:30px; top:45px;">
	    <div style="font-size:40px; color: #000;  text-align:left;  font-family:oswald-regular ; ">##FULLNAME##</div>
	    <div style="font-size:39px; color: #000;  text-align:left; padding-top:5px;  font-family:oswald-regular ; ">##CONTACT##</div>
	    <div style="position:relative; left:0; top:80px;">
	      <table>
	        <tr>
	          <td><table cellpadding="0" cellspacing="0" width="100%" border="0">
	              <tr >
	                <td style="padding-top:5px; "></td>
	                <td style="padding-left:10px; font-size:20px; color: #000; line-height:0; font-family:opansans-regular;">##EMAIL_ADDRESS##</td>
	              </tr>
	              <tr>
	                <td style="padding-top:8px;"></td>
	                <td style="padding-left:10px; font-size:20px; color: #000; font-family:opansans-regular; padding-top:5px;">##WEBSITE##</td>
	              </tr>
	            </table></td>
	        </tr>
	      </table>
	    </div>
	  </div>
	  <div style="width:700px; height:310px; position:absolute; right:0; bottom:0;">
	    <div style="position:relative; left:0; top:0; font-size:28px; color: #000;  font-family:oswald_light; text-transform:uppercase;">##HEADING##</div>
	    <div style="position:relative; left:0; top:10px;">
	      <table>
	        <tr>
	          <td align="left"><table>
	            </table></td>
	        </tr>
	      </table>
	    </div>
	    <div style="position:relative; width:650px; left:0; top:25px; font-size:18px; color: #000;  font-family:opansans-regular; line-height:22px;">##DESCRIPTION_4##</div>
	  </div>
	</div>
	</div>
	</page>';
}