<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\MediaKsc;
use AppBundle\Entity\User;
use AppBundle\Form\MediaKscType;
use Symfony\Component\Validator\Constraints\DateTime;

use Liip\ImagineBundle\LiipImagineBundle;


/**
 * MediaKsc controller.
 *
 */
class ImageKscController extends Controller {

	/**
	 * Lists all MediaKsc entities.
	 *
	 */
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$mediaKscs = $em->getRepository('AppBundle:MediaKsc')->findAll();
		return $this->render('imageksc/index.html.twig', array(
					'mediaKscs' => $mediaKscs,
		));
	}

	public function newAction(Request $request) {
		//FolderName Image Upload
		
		$status="";
		$mediaKsc = new MediaKsc();
		$form = $this->createForm('AppBundle\Form\MediaKscType', $mediaKsc);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {


			if ($this->getUser()) {
				
		$identifier = 'KSC_I';
		$files="files/";
		$prefix_ii = uniqid($identifier);
		$fileFolder=$files.$identifier."/".$prefix_ii;
		
				$user = $this->getUser();

				//Image data
				$em = $this->getDoctrine()->getManager();
				$img = $form["url"]->getData();
				$ext = $img->guessExtension();
				
				if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="GIF" ){
				
				$SizeArr = getimagesize($img);
				$w = $SizeArr[0];   //with
				$h = $SizeArr[1];  //Height
				$size = $w . "  x  " . $h . " px";
				$filename = time() . "." . $ext;
				$img->move($fileFolder, $filename);
				$filesave = $fileFolder."/".$filename;
				$mediaKsc->setUrl($filesave);
				
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
				$gallery="GAL";
				

				
				$mediaKsc->setSize($size);
				$mediaKsc->setDuration("null");
				$mediaKsc->setType("Image");
				$mediaKsc->setUrlld($urlLd);
				$mediaKsc->setUrlthumb($urlThumb);
				$mediaKsc->setDateCreated($time);
				$mediaKsc->setDateObject($time);
				$mediaKsc->setColor($colorR);
				$mediaKsc->setResolution($resolution);
				$mediaKsc->setGallery($gallery);
				$mediaKsc->setTags($tags);
				$mediaKsc->setFormat($ext);
				$mediaKsc->setIdUser($user);
//			$mediaKsc->setCopy($form["copy"]->getData());


				$em->persist($mediaKsc);
				$em->flush();
				
		return $this->redirectToRoute('media_show', array('id' => $mediaKsc->getId()));
				} else {
					
					$status="<div class='alert alert-warning'> File not supported</div>";
					
				}
			//get user
			} else {
				$status="<div class='alert alert-warning'> Please Login first!</div>";
			}
		}

		return $this->render('imageksc/new.html.twig', array(
					'mediaKsc' => $mediaKsc,
					'form' => $form->createView(),
					'status'=>$status
		));

		//New action Image
			}

	/**
	 * Finds and displays a MediaKsc entity.
	 *
	 */
	public function showAction(MediaKsc $mediaKsc) {

		$status="";
		return $this->render('imageksc/show.html.twig', array(
					'mediaKsc' => $mediaKsc,
					'status'=>$status
					
		));
	}

	/**
	 * Displays a form to edit an existing MediaKsc entity.
	 *
	 */
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
			$gallery = "GAL";
			
			
			
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
				$gallery = "GAL";
				$mediaKsc->setSize($size);
				$mediaKsc->setDuration("null");
				$mediaKsc->setType("Img");
				$mediaKsc->setUrlld($urlLd);
				$mediaKsc->setUrlthumb($urlThumb);
				$mediaKsc->setDateCreated($time);
				$mediaKsc->setDateObject($time);
				$mediaKsc->setColor($colorR);
				$mediaKsc->setResolution($resolution);
				$mediaKsc->setGallery($gallery);
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
	}
	/**
	 * Creates a form to delete a MediaKsc entity.
	 *
	 * @param MediaKsc $mediaKsc The MediaKsc entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */

}
