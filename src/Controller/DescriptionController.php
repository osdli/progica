<?php

declare(strict_types=1);

namespace App\Controller;


use App\Controller\ControllerInterface\EntityController;
use App\Entity\Description;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Rest\Route("/api")
 *
 */
final class DescriptionController extends AbstractController implements EntityController
{
    /** @var EntityManagerInterface */
    private EntityManagerInterface $em;

    /** @var SerializerInterface */
    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @Rest\Get("/descriptions", name="findAllDescriptions")
     */
    public function findAllAction(): JsonResponse
    {
        $descriptions = $this->em->getRepository(Description::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($descriptions, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Get("/descriptions/{id}", name="findOneDescription")
     * @param string $id
     * @return JsonResponse
     */
    public function findOneAction(string $id): JsonResponse
    {
        $description = $this->em->getRepository(Description::class)->find($id);
        $data = $this->serializer->serialize($description, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }
}
