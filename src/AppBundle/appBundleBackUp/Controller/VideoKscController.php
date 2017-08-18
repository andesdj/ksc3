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
				
				$gallery="GAL";
				$externalU="none";
				$mediaKsc->setExternalUrl($externalU);
				
				
				$mediaKsc->setSize($size);
				$mediaKsc->setDuration($duration);
				$mediaKsc->setType("Video");
				$mediaKsc->setUrlld($urlLd);
				$mediaKsc->setUrlthumb($vid_pre);
				$mediaKsc->setDateCreated($time);
				$mediaKsc->setDateObject($time);
				$mediaKsc->setColor($colorR);
				$mediaKsc->setResolution($resolution);
				$mediaKsc->setGallery($gallery);
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
			

}
