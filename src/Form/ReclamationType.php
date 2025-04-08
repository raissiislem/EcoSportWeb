<?php

// src/Form/ReclamationType.php

namespace App\Form;

use App\Entity\Reclamation;
use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReclamationType extends AbstractType
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('event', EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'title', // Display event title in the dropdown
                'placeholder' => 'Choose an event',
                'choices' => $this->eventRepository->findAllEvents(),// Fetch events from the repository
            ])
            ->add('Ajouter',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
