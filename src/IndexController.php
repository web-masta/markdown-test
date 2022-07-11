<?php
    namespace WebMasta\MarkdownTest;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    
    class IndexController extends AbstractController
    {
        #[Route('/markdown', name: 'markdown_index')]
        //asasd
        public function index(): Response
        {
            return $this->json([
                'status' => 'success',
                'message' => 'Welcome to Markdown IndexController!',
                'rand' => rand(1, 100),
            ]);
        }
    }