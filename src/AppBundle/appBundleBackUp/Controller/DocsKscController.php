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


class DocsKscController extends Controller {

public function newAction(Request $request) {
	
	
	$preWord="assets/thumbs/MSW_thumbs.jpg";
	$preExcel="assets/thumbs/MSE_thumbs.jpg";
	$prePpt="assets/thumbs/MSP_thumbs.jpg";
	$prePdf="assets/thumbs/PDF_thumbs.jpg";
	$prePages="assets/thumbs/pages_thumbs.jpg";
	$alls="assets/thumbs/output.png";
	
		//FolderName Image Upload
		$status="";
		$mediaKsc = new MediaKsc();
		$form = $this->createForm('AppBundle\Form\MediaKscType', $mediaKsc);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			if ($this->getUser()) {
				
		$identifier = 'KSC_D';
		$files="files/";
		$prefix_ii = uniqid($identifier);
		$fileFolder=$files.$identifier."/".$prefix_ii;
		
				$user = $this->getUser();
				
				
				

				
				
		
				//Image data
				$em = $this->getDoctrine()->getManager();
				$vid = $form["url"]->getData();
				$ext = $vid->guessExtension();
				
				$type="Document";
				if($ext=="doc" || $ext=="docx" || $ext=="ppt"  || $ext=="pptx"  || $ext=="xls"  || $ext=="xlsx"  || $ext=="pdf"  || $ext=="pages" ){

					switch ($ext) {
						
					 case "doc":	
						  $format="Word";
						 $thumb=$preWord;
						 break;
					 case "docx":	
						  $format="Word";
						$thumb=$preWord;
						 break;						
						
					 case "ppt":	
						  $format="PowerPoint";
						 $thumb=$prePpt;
						 break;						
						
					 case "pptx":	
						 $format="PowerPoint";
						 $thumb=$prePpt;
						 break;								


					 case "xls":	
						  $format="Excel";
						 $thumb=$preExcel;
						 break;		

					 case "xlsx":	
						 $format="Excel";
						 $thumb=$preExcel;
						 break;			

					 case "pdf":	
						 $thumb=$prePdf;
						  $format="PDF";
						 break;		

					 case "pages":	
						$thumb=$prePages;	
						 $format="Pages";
						 break;		
			 
					}
					
					
				$filename = time() . "." . $ext;
				$vid->move($fileFolder, $filename);
				
				$filesave = $fileFolder."/".$filename;
				$urlLd=$filesave;
				
				//Save thumb
				
				$size = "Null"; //get Size MB
				$time = $this->updated = new \DateTime("now");
				$time->format('Y-m-d H:i:s');
				$colorR = "No Info.";
				$resolution = $request->request->get('resolution_obj');
				//$gallery=$request->request->get('gallery_obj');			
				$tagsArr = $request->request->get('tags_obj');
				$tags = implode(',', $tagsArr);
				$dateObj = $request->request->get('year_obj');
				$duration = "No data";
				$urlThumb = $prefix_ii . "assets/thumbs/V_thumbs.jpg";
				
				$gallery="GAL";
				
				
				$externalU="none";
				$mediaKsc->setExternalUrl($externalU);			
				
				$mediaKsc->setSize($size);
				$mediaKsc->setDuration($duration);
				$mediaKsc->setType($type);
				$mediaKsc->setUrlld($urlLd);
				$mediaKsc->setUrlthumb($thumb);
				$mediaKsc->setDateCreated($time);
				$mediaKsc->setDateObject($time);
				$mediaKsc->setColor($colorR);
				$mediaKsc->setResolution($resolution);
				$mediaKsc->setGallery($gallery);
				$mediaKsc->setTags($tags);
				$mediaKsc->setFormat($format);
				$mediaKsc->setIdUser($user);
				$mediaKsc->setUrlld($filesave);
				$mediaKsc->setUrl($thumb);
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
		return $this->render('docs/new.html.twig', array(
					'mediaKsc' => $mediaKsc,
					'form' => $form->createView(),
					'status'=>$status
		));
		//New action Video
}
	
	
	
	
	
	

}
