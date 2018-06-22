<?php

use App\Crawlers\Github as GithubCrawler;
use App\Crawlers\RepositoryCollection;
use Github\Api\User;
use Github\Client;
use Github\Exception\RuntimeException as GithubRuntimeException;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    private $mockedClient;
    private $mockedUser;
    private $githubUser;

    public function setUp()
    {
        $this->githubUser = 'some_github_user';

        $this->mockedUser = Mockery::mock(User::class);

        $this->mockedClient = Mockery::mock(Client::class);
        $this->mockedClient->shouldReceive('api')
            ->with('user')
            ->andReturn($this->mockedUser);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    /**
     * Testa a listagem de um repositório existente do Github
     *
     * @test
     */
    public function lists_a_github_repository()
    {
        $item = ['name' => 'Repository name', 'description' => 'Some description'];

        $this->mockedUser->shouldReceive('repositories')
            ->with($this->githubUser)
            ->andReturn([$item]);

        $github = new GithubCrawler($this->mockedClient);
        $repositories = $github->listRepositories($this->githubUser);

        $this->assertArrayHasKey('name', $repositories[0]);
        $this->assertArrayHasKey('description', $repositories[0]);
    }
}