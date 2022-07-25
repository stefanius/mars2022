<?php

namespace Tests\Feature\Web\Backoffice\Administrator;

use Tests\Feature\Web\Backoffice\BackofficeTestCase;

abstract class AdministratorTestCase extends BackofficeTestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsAdministrator();
    }
}
