<?php
    namespace WebMasta\MarkdownTest\Controllers;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use WebMasta\MarkdownTest\Form\MarkdownForm;

    class MarkdownController extends AbstractController
    {
        #[Route('/markdown', name: 'markdown_form')]
        public function index(): Response
        {
            $form = $this->createForm(MarkdownForm::class);

            return $this->render('markdown/index.html.twig', [
                'title' => 'Markdown Test',
                'form' => $form->createView(),
            ]);
        }

        #[Route('/markdown/api', name: 'markdown_api')]
        public function api(): Response
        {
            return $this->json([
                'status' => 'success',
                'output' => 'some <strong>formatted</strong> text',
            ]);
        }
    }