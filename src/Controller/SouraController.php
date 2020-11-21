<?php

namespace App\Controller;

use App\Entity\Aya;
use App\Entity\AyaAccent;
use App\Entity\PartSoura;
use App\Entity\Soura;
use App\Form\AyaAccentType;
use App\Form\AyaType;
use App\Form\PartSouraType;
use App\Form\SouraSelectType;
use App\Form\SouraType;
use App\Repository\AyaAccentRepository;
use App\Repository\AyaRepository;
use App\Repository\SouraRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SouraController extends AbstractController
{

    /**
     * @Route("/",name="home")
     */
    public function home(SouraRepository $repo, AyaRepository $repoAya)
    {
        $words=[];
        $ayas = $repoAya->findAll();
        $countAya = count($ayas);
        foreach ($ayas as $aya){
            $words = array_merge($words,explode(" ", $aya->getContent()));
        } 
        $count = count($words);

        return $this->render("soura/home.html.twig",[
            'souras'    => $repo->findAll(),
            'count'     => $count,
            'countAya'  => $countAya
        ]);
    }

    /**
     * @Route("/soura", name="soura")
     */
    public function soura(SouraRepository $repo)
    {
        $souras = $repo->findAll();
        return $this->render('soura/soura.html.twig', [
            'souras' => $souras
        ]);
    }

    /**
     * @Route("/soura/{id}/show", name="soura_show")
     */
    public function show_soura(Soura $soura)
    {
        $words = [];
        foreach ($soura->getAyas() as $aya){
            $words = array_merge($words, explode(" ",$aya->getContent()));
        }
        $count = count($words);

        return $this->render('soura/soura_show.html.twig', [
            'soura' => $soura,
            'count' => $count
        ]);
    }


    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request, EntityManagerInterface $manager)
    {
        
        $soura = new Soura();

        $formSoura = $this->createForm(SouraType::class, $soura);
        $formSoura->handleRequest($request);
        if ($formSoura->isSubmitted() && $formSoura->isValid()) {
            $manager->persist($soura);
            $manager->flush();

            return $this->redirectToRoute('admin');
        }

        $aya = new Aya();
        $formAya = $this->createForm(AyaType::class, $aya);
        $formAya->handleRequest($request);
        if ($formAya->isSubmitted() && $formAya->isValid()) {
            $manager->persist($aya);
            $manager->flush();

            return $this->redirectToRoute('admin', ['number' => $aya->getNumber(), 'soura' => $aya->getSoura()]);
        }

        $ayaAccent = new AyaAccent();
        $formAyaAccent = $this->createForm(AyaAccentType::class, $ayaAccent);
        $formAyaAccent->handleRequest($request);
        if ($formAyaAccent->isSubmitted() && $formAyaAccent->isValid()) {
            $manager->persist($ayaAccent);
            $manager->flush();

            return $this->redirectToRoute('admin', ['number' => $ayaAccent->getNumber(), 'soura' => $ayaAccent->getSoura()]);
        }

        $part_soura = new PartSoura();
        $formPart = $this->createForm(PartSouraType::class, $part_soura);
        $formPart->handleRequest($request);

        
        if ($formPart->isSubmitted() && $formPart->isValid()) {
            $manager->persist($part_soura);
            $manager->flush();

            return $this->json(['message'=>'un aya est ajouté']);
        }

        return $this->render('soura/admin.html.twig', [
            'formSoura' => $formSoura->createView(),
            'formAya' => $formAya->createView(),
            'formAyaAccent' => $formAyaAccent->createView(),
            'formPart' => $formPart->createView(),
        ]);
    }

    /**
     * @Route("/search",name="search_word")
     */
    public function search(AyaRepository $repo, AyaAccentRepository $repoAccent, Request $request)
    {
        $array = [];
        $count = 0;
        $word = $request->query->get('word');
        if (($request->getMethod() === 'GET') &&  ($word !=null)){
          
            $ayas = $repo->findAll();
            foreach ($ayas as $aya) {
                //vérifier si une string existe dans une chaine de caractères
                if (stristr($aya->getContent(), $word)){
                    $ayaAccent=$repoAccent->findOneBy(['id' => $aya->getId()]);
                    

                    //retourne le nobmre d'occurences d'une string
                    $result = substr_count($aya->getContent(),$word);
                    $count+=$result;

                    array_push($array,['aya'=>$aya->getContent(), 'soura'=>$aya->getSoura(), 'number' =>$aya->getNumber(), 'id'=>$aya->getId(), 'repeat'=>$result]);
                }  
            }   
        }
        return $this->render('soura/search.html.twig', [
            'array' => $array,
            'count' => $count,
            'word'  => $word
        ]);
    }

    /**
     * @Route("/oneAya/{id}",name="oneAya")
     */
    public function oneAya(AyaAccent $ayaAccent)
    {
        return $this->render('soura/oneAya.html.twig',[
            'ayaAccent' => $ayaAccent
        ]);
    }
}
