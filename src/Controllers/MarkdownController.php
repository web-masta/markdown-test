<?php
    namespace WebMasta\MarkdownTest\Controllers;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use WebMasta\MarkdownTest\Form\MarkdownForm;
    use WebMasta\MarkdownTest\Models\MarkDownModel;

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
        public function api(Request $request): Response
        {
            $status = 'error';
            $result = null;

            if (null !== $request->request->get('text')) {
                $status = 'success';
                $markdown = new MarkDownModel($request->request->get('text'));
                $result = $markdown->replace();
            }
            return $this->json([
                'status' => $status,
                'result' => $result,
            ]);
        }
    }