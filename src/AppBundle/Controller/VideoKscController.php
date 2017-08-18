<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\MediaKsc;
use AppBundle\Entity\User;
use AppBundle\Form\MediaKscType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\UploadedFile;


use Liip\ImagineBundle\LiipImagineBundle;


class VideoKscController extends Controller {

public function newAction(Request $request) {
		//FolderName Image Upload
		$status="";
		$mediaKsc = new MediaKsc();
		$form = $this->createForm('AppBundle\Form\MediaKscType', $mediaKsc);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			if ($this->getUser()) {
				
		$identifier = 'KSC_V';
		$files="files/";
		$vid_pre="assets/thumbs/V_thumbs.jpg";
		$prefix_ii = uniqid($identifier);
		$fileFolder=$files.$identifier."/".$prefix_ii;
		
				$user = $this->getUser();
				
				
				
				$data = $this->getRequest()->request->all();
				$cover= $this->getRequest()->files->get('cover_obj');
				
				
				// $cover=$request->request->get('cover_obj');
				
				$extC=$cover->guessExtension();
				

				//Image data
				$em = $this->getDoctrine()->getManager();
				$vid = $form["url"]->getData();
				$ext = $vid->guessExtension();
				
				if($ext=="mp4" || $ext=="ogg" || $ext=="webm" ){
				
				
				$filename = time() . "." . $ext;
				$vid->move($fileFolder, $filename);
				
				$filesave = $fileFolder."/".$filename;
				$urlLd=$filesave;
				
				//Save Cover
				$covername = "thumb." .$extC;
				$filesaveC = $fileFolder."/".$covername;
				$cover->move($fileFolder, $covername);

			
				
				$size = "Null"; //get Size MB
				$time = $this->updated = new \DateTime("now");
				$time->format('Y-m-d H:i:s');
				$colorR = "No Info.";
				$resolution = $request->request->get('resolution_obj');
				//$gallery=$request->request->get('gallery_obj');			
				$tagsArr = $request->request->get('tags_obj');
				$tags = implode(',', $tagsArr);
				$dateObj = $request->request->get('year_obj');
				$duration = $request->request->get('duration_obj');
				$urlThumb = $prefix_ii . "assets/thumbs/V_thumbs.jpg";
				
				
				$externalU="none";
				$mediaKsc->setExternalUrl($externalU);
				
				
				$mediaKsc->setSize($size);
				$mediaKsc->setDuration($duration);
				$mediaKsc->setType("videos");
				$mediaKsc->setUrlld($urlLd);
				$mediaKsc->setUrlthumb($vid_pre);
				$mediaKsc->setDateCreated($time);
				$mediaKsc->setDateObject($time);
				$mediaKsc->setColor($colorR);
				$mediaKsc->setResolution($resolution);
								$mediaKsc->setTags($tags);
				$mediaKsc->setFormat($ext);
				$mediaKsc->setIdUser($user);
				
				$mediaKsc->setUrlld($filesave);
				$mediaKsc->setUrl($filesaveC);
//				$mediaKsc->setCopy($form["copy"]->getData());
				
		
				$em->persist($mediaKsc);
				$em->flush();
				
				return $this->redirectToRoute('image_show', array('id' => $mediaKsc->getId()));
				} else {
					$status="<div class='alert alert-warning'> Video file not supported</div>";
				}
			//get user
			} else {
				$status="<div class='alert alert-warning'> Please Login first!</div>";
			}
		}
		return $this->render('video/new.html.twig', array(
					'mediaKsc' => $mediaKsc,
					'form' => $form->createView(),
					'status'=>$status
		));
		//New action Video
}





	public function editAction(Request $request, MediaKsc $mediaKsc) {
		
		$user = $this->getUser();
		$editForm = $this->createForm('AppBundle\Form\MediaKscType', $mediaKsc);
		$myId=$mediaKsc->getId();
		$editForm->handleRequest($request);
			$em = $this->getDoctrine()->getManager();
			$filesaveA=$mediaKsc->getUrl();	
			$size=$mediaKsc->getSize();
			$ext=$mediaKsc->getFormat();
			$color=$mediaKsc->getColor();
			
			$status="";
		
		if ($editForm->isSubmitted() && $editForm->isValid()) {
			
			
			$identifier = 'KSC_I';
				$files="files/";
				$prefix_ii = uniqid($identifier);
				$fileFolder=$files.$identifier."/".$prefix_ii;
			
			$img = $editForm["url"]->getData();
			
			$time = $this->updated = new \DateTime("now");
			$time->format('Y-m-d H:i:s');
			$colorR = $request->request->get('color_obj');
			$resolution = $request->request->get('resolution_obj');
			//$gallery=$request->request->get('gallery_obj');			
			$tagsArr = $request->request->get('tags_obj');
			$tags = implode(',', $tagsArr);
			$dateObj = $request->request->get('year_obj');
			$urlThumb = $prefix_ii . "/thumbs.com";
			$urlLd = $prefix_ii . "/google.com";
			$thumbFolder = $prefix_ii . "/thumbs";
		
			
			
			
			//var_dump($img);
			

			if(!empty($img) && $img != null){
		
			
		
				$ext = $img->guessExtension();
				$SizeArr = getimagesize($img);
				$w = $SizeArr[0];   //with
				$h = $SizeArr[1];  //Height
				$size = $w . "  x  " . $h . " px";
				$filename = time() . "." . $ext;
				$img->move($fileFolder, $filename);
				$filesave = $fileFolder."/".$filename;
				
			} else  {
				echo $f;
					die();

			$mediaKsc->setUrl($filesaveA);
	
			}
			
				$externalU="none";
				$mediaKsc->setExternalUrl($externalU);
				$mediaKsc->setUrl($filesave);
				$tags = implode(',', $tagsArr);
				$dateObj = $request->request->get('year_obj');
				$urlThumb = $prefix_ii . "/thumbs.com";
				$urlLd = $prefix_ii . "/google.com";
				$thumbFolder = $prefix_ii . "/thumbs";
				$externalU="none";
				$mediaKsc->setSize($size);
				$mediaKsc->setDuration("null");
				$mediaKsc->setType("Img");
				$mediaKsc->setUrlld($urlLd);
				$mediaKsc->setUrlthumb($urlThumb);
				$mediaKsc->setDateCreated($time);
				$mediaKsc->setDateObject($time);
				$mediaKsc->setColor($colorR);
				$mediaKsc->setResolution($resolution);
				$mediaKsc->setTags($tags);
				$mediaKsc->setFormat($ext);
				$mediaKsc->setIdUser($user);
				$externalU="none";
				$mediaKsc->setExternalUrl($externalU);
		
			$em->persist($mediaKsc);
			$flush= $em->flush();
		
			
			if($flush!=null){
				$status= "Success";
			} else {
				
				$status= "Content was not edited";
			}
			

			return $this->redirectToRoute('media_show', array('id' => $mediaKsc->getId()));
		}

		return $this->render('imageksc/edit.html.twig', array(
					'mediaKsc' => $mediaKsc,
					'status'=>$status,
					'edit_form' => $editForm->createView(),
				
		));
		
		
		//Edit Video
	}




}
