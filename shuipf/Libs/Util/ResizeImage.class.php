<?php
/***************************************/
/*功 能：利用PHP的GD库生成高质量的缩略图*/
/*运行环境:PHP5.01/GD2*/
/*类说明：可以选择是/否裁图。

                  如果裁图则生成的图的尺寸与您输入的一样。
                  原则：尽可能多保持原图完整

                  如果不裁图，则按照原图比例生成新图
                  原则：根据比例以输入的长或者宽为基准*/
/*参 数：$img:源图片地址
                 $wid:新图的宽度
                 $hei:新图的高度
                 $c:是否裁图，1为是，0为否*/
/* Author: antplus         */
/* version: 1.1             */
/* QQ:      38188141        */
/* MSN:     [email]antplus@163.net[/email] */
/***************************************/

class ResizeImage
{
        //图片类型
        var $type;
        //实际宽度
        var $width;
        //实际高度
        var $height;
        //改变后的宽度
        var $resize_width;
        //改变后的高度
        var $resize_height;
        //是否裁图
        var $cut;
        //源图象
        var $srcimg;
        //目标图象地址
        var $dstimg;
        //临时创建的图象
        var $im;
		//裁切起始x
		var $crop_left;
		//裁切起始y
		var $crop_top;
		//输出函数
		var $output_func;
		//输出文件类型
		var $out_ext;

        function __construct($img, $wid, $hei,$c)
        {
                //echo $img.$wid.$hei.$c;
                $this->srcimg = $img;
                $this->resize_width = $wid;
                $this->resize_height = $hei;
				if(is_array($c)){
					$this->crop_left=$c['left'] ?:0;
					$this->crop_top=$c['top'] ?:0;
					$this->out_ext=$c['fmt'];
				}else{
					$this->crop_left=0;
					$this->crop_top=0;
					$this->cut = $c;
					$this->out_ext='jpg';
				}
                //图片的类型
                $this->type = strtolower(substr(strrchr($this->srcimg,"."),1));
                //初始化图象
                $this->initi_img();
                //目标图象地址
                $this -> dst_img();
     				if(!file_exists($this->dstimg))
     				{         //imagesx imagesy 取得图像 宽、高
     				
	                $this->width = imagesx($this->im);
	                $this->height = imagesy($this->im);
					if(!$this->resize_width) $this->resize_width=$this->width;
					if(!$this->resize_height) $this->resize_height=$this->height;
	                //生成图象
	                $this->newimg();
	                ImageDestroy ($this->im);
               }
        }
		
        function newimg()
        {
					$imcr =function_exists('imagecreatetruecolor');
					$imcp =function_exists('imagecopyresampled');
					$imjpeg =function_exists('imagejpeg');
					if(!$imcr || !$imcp || !$imjpeg){
						throw new Exception('imagecreatetruecolor exist('.$imcr.'), imagecopyresampled exist('.$imcp.'), imagejpeg exists('.$imjpeg.')');
					}else{
						//var_dump($imcr ,$imcp ,$imjpeg  );
					}
                // +----------------------------------------------------+
                // | 增加LOGO到缩略图中 Modify By Ice
                // +----------------------------------------------------+
                //Add Logo
                //$logoImage = ImageCreateFromJPEG('t_a.jpg');
                //ImageAlphaBlending($this->im, true);
                //$logoW = ImageSX($logoImage);
                //$logoH = ImageSY($logoImage);
                // +----------------------------------------------------+

                //实际图象的比例
                $ratio = ($this->width)/($this->height);
     				 //改变后的图象的比例
                $resize_ratio = ($this->resize_width)/($this->resize_height);
                if(($this->cut)=="1")
                //裁图
                {
                        if($ratio>=$resize_ratio)
                        //高度优先
                        {
                                //imagecreatetruecolor — 新建一个真彩色图像
                                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                                //imagecopyresampled — 重采样拷贝部分图像并调整大小
                                imagecopyresampled($newimg, $this->im, 0, 0, $this->crop_left, $this->crop_top, $this->resize_width,$this->resize_height, (($this->height)*$resize_ratio), $this->height);


                                // +----------------------------------------------------+
                                // | 增加LOGO到缩略图中 Modify By Ice
                                // +----------------------------------------------------+
                                //ImageCopy($newimg, $logoImage, 0, 0, 0, 0, $logoW, $logoH);
                                // +----------------------------------------------------+

                                //imagejpeg — 以 JPEG 格式将图像输出到浏览器或文件
                                imagejpeg ($newimg,$this->dstimg,100);
                        }
                        if($ratio<$resize_ratio)
                        //宽度优先
                        {
                                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                                imagecopyresampled($newimg, $this->im, 0, 0, $this->crop_left, $this->crop_top, $this->resize_width, $this->resize_height, $this->width, (($this->width)/$resize_ratio));


                                // +----------------------------------------------------+
                                // | 增加LOGO到缩略图中 Modify By Ice
                                // +----------------------------------------------------+
                                //ImageCopy($newimg, $logoImage, 0, 0, 0, 0, $logoW, $logoH);
                                // +----------------------------------------------------+


                                imagejpeg ($newimg,$this->dstimg,100);
                        }

                }
                else
                //不裁图
                {
                			//var_dump($ratio,$resize_ratio);
                        if($ratio>=$resize_ratio && $this->resize_width<  $this->width )
                        {
                                $newimg = imagecreatetruecolor($this->resize_width,($this->resize_width)/$ratio);
                                imagecopyresampled($newimg, $this->im, 0, 0, $this->crop_left, $this->crop_top, $this->resize_width, ($this->resize_width)/$ratio, $this->width, $this->height);

                                // +----------------------------------------------------+
                                // | 增加LOGO到缩略图中 Modify By Ice
                                // +----------------------------------------------------+
                                //ImageCopy($newimg, $logoImage, 0, 0, 0, 0, $logoW, $logoH);
                                // +----------------------------------------------------+
                                imagejpeg ($newimg,$this->dstimg,100);
                        }elseif($ratio<$resize_ratio && $this->resize_height<  $this->height )
                        {
                                $newimg = imagecreatetruecolor(($this->resize_height)*$ratio,$this->resize_height);
                                imagecopyresampled($newimg, $this->im, 0, 0, $this->crop_left, $this->crop_top, ($this->resize_height)*$ratio, $this->resize_height, $this->width, $this->height);


                                // +----------------------------------------------------+
                                // | 增加LOGO到缩略图中 Modify By Ice
                                // +----------------------------------------------------+
                                //ImageCopy($newimg, $logoImage, 0, 0, 0, 0, $logoW, $logoH);
                                // +----------------------------------------------------+
                                imagejpeg ($newimg,$this->dstimg,100);
								
                        }else{
                        		copy($this->srcimg,$this->dstimg);
                        }
                }
                // +----------------------------------------------------+
                // | 释放资源 Modify By Ice
                // +----------------------------------------------------+
                //ImageDestroy($logoImage);
                // +----------------------------------------------------+

        }
		//输出图像
		function output_img($img){
					$out_func = 'image'.($this->out_ext=='jpg' ? 'jpeg' : $this->out_ext);
					if(!function_exists($out_func)) $out_func ='imagejpeg';
					switch($this->out_ext){
						case 'jpg':
							imagejpeg($img,$this->dstimg,100);
							break;
						case 'png':
							$out_func($img,$this->dstimg,1);
							break;
						default:
							$out_func($img,$this->dstimg);
					}
		}
        //初始化图象
       
        function initi_img()
        {
        			$createfun = 'imagecreatefrom' . ($this->type == 'jpg' ? 'jpeg' : $this->type);
        			if(function_exists($createfun))  $this->im = $createfun($this->srcimg);
        			else throw new Exception($createfun.' not exists!');
        }
    
        //图象目标地址
        function dst_img()
        {
                $this->dstimg = $this->srcimg.'_'.$this->resize_width.'x'.$this->resize_height.'.'.$this->out_ext;
        }
        //输出图片到浏览器
    		function dump_img(){
    				header("content-type: image/".$this->out_ext.";");
    				echo fread(fopen($this->dstimg,'rb'),filesize($this->dstimg));
    		}
}
?>
