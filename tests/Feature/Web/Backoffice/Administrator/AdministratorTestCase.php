<?php

namespace Tests\Feature\Web\BackOffice\Administrator;

use Tests\Feature\Web\BackOffice\BackOfficeTestCase;

abstract class AdministratorTestCase extends BackOfficeTestCase
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
