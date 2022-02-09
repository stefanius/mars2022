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

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [];
    }

    /**
     * Skip these attributes during live validation.
     *
     * @return array
     */
    protected function skipLiveValidation()
    {
        return [];
    }

    /**
     * Determines when a property allows live validation.
     *
     * @param string $property
     *
     * @return bool
     */
    protected function liveValidationFor(string $property)
    {
        [$attribute] = explode('.', $property, 2);

        return !collect($this->skipLiveValidation())->contains($attribute);
    }

    /**
     * Allows submit on the final step.
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

    /**
     * Get the validation rules for a given step.
     *
     * @param int $step
     *
     * @return array
     */
    protected function rulesForStep(int $step): array
    {
        $rules = $this->rules();

        return $rules[$step] ?? [];
    }

    /**
     * Get the validation rules for the current step.
     *
     * @return array
     */
    protected function rulesForCurrentStep(): array
    {
        return $this->rulesForStep($this->step);
    }

    /**
     *
     * @return array
     */
    protected function attributes()
    {
        return [];
    }

    /**
     * Listen to updated event.
     *
     * @param string $propertyName
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated(string $propertyName)
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
        $this->validate($this->rulesForCurrentStep(), [], $this->attributes());

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
