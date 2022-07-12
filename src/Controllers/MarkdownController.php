<?php
    namespace WebMasta\MarkdownTest\Controllers;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class MarkdownController extends AbstractController
    {
        #[Route('/markdown', name: 'markdown_form')]
        public function index(): Response
        {
            return $this->render('markdown/index.html.twig', [
                'title' => 'Markdown Test',
            ]);
        }

        #[Route('/markdown/api', name: 'markdown_api')]
        public function api(): Response
        {
            return $this->json([
                'status' => 'success',
                'output' => 'some formatted text',
            ]);
        }

    }