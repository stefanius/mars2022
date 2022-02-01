<?php

namespace App\Http\Livewire;

use Livewire\Component;

abstract class FormWizard extends Component
{
    /**
     * Current step.
     *
     * @var int
     */
    public $step = 1;

    /**
     * Max amount of steps.
     *
     * @var int
     */
    public $maxStep = 5;

    protected function rules()
    {
        return [];
    }

    protected function skipLiveValidation()
    {
        return [];
    }

    protected function liveValidationFor($property)
    {
        [$attribute] = explode('.', $property, 2);

        return !collect($this->skipLiveValidation())->contains($attribute);
    }

    /**
     * Allow submit.
     *
     * @return bool
     */
    public function allowSubmit()
    {
        return $this->step === $this->maxStep;
    }

    /**
     * Go to previous step.
     */
    public function previous()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    protected function rulesForStep(int $step)
    {
        $rules = $this->rules();

        return $rules[$step] ?? [];
    }

    protected function rulesForCurrentStep()
    {
        return $this->rulesForStep($this->step);
    }

    public function updated($propertyName)
    {
        if ($this->liveValidationFor($propertyName)) {
            $this->validateOnly($propertyName, $this->rulesForCurrentStep());
        }
    }

    /**
     * Go te next step.
     */
    public function next()
    {
        $rules = $this->rules();

        if (array_key_exists($this->step, $rules)) {
            $this->validate($rules[$this->step]);
        }

        if ($this->step < $this->maxStep) {
            $this->step++;
        }
    }

    /**
     * Go to first step.
     */
    public function firstPage()
    {
        $this->step = 1;
    }

    /**
     * Submit form wizard.
     */
    abstract public function submit();

    /**
     * Render form wizard.
     */
    abstract public function render();
}
