<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('surname', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
            ])
            ->add('standpoint', ChoiceType::class, [
                'choices' => [
                    'Tester' => 'tester',
                    'Developer' => 'developer',
                    'Project Manager' => 'project_manager'
                ],
                'placeholder' => 'Select your position',
                'required' => true,
            ])
            ->add('testingSystems', TextType::class, ['label' => 'Testing systems','required' => false,])
            ->add('reportingSystems', TextType::class, ['label' => 'Reporting systems','required' => false,])
            ->add('knowsSelenium', CheckboxType::class, ['label' => 'Knows selenium','required' => false])
            ->add('ideEnvironments', TextType::class, ['label' => 'IDE environments','required' => false,])
            ->add('programmingLanguages', TextType::class, ['label' => 'Programming languages','required' => false,])
            ->add('knowsMySQL', CheckboxType::class, ['label' => 'Knows MySQL','required' => false,])
            ->add('projectMethodologies', TextType::class, ['label' => 'Project Methodologies','required' => false,])
            ->add('reportingSystems', TextType::class, ['label' => 'Reporting systems','required' => false,])
            ->add('knowsScrum', CheckboxType::class, ['label' => 'Knows SCRUM','required' => false,])
            ->add('submit', SubmitType::class, [
                'label' => 'Register',
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}