<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=true)
     */
    private $role;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=true)
     */
    private $username;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Users
     */
    public function setId(int $id): Users
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Users
     */
    public function setEmail(string $email): Users
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return Users
     */
    public function setPassword(string $password): Users
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     * @return Users
     */
    public function setRole(string $role): Users
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return Users
     */
    public function setUsername(string $username): Users
    {
        $this->username = $username;
        return $this;
    }

}
