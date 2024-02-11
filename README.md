# Songbook
<p>
  Songbook app is an digital adaptation of 
  <br />
  <a href="https://github.com/przemekdan1/Songbook"><strong>Explore the docs »</strong></a>
</p>

## About The Project
### Web
![image](https://github.com/przemekdan1/Songbook/assets/101727232/78061b24-fba8-4522-a02d-2fbbb90ad05c)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/f1ecaf2d-5f31-4ced-a0c6-f1c1d27940bb)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/31bad21e-1f31-423d-840c-dfabb897b1bf)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/2c98994c-c8a3-4f69-9eb1-633bf0236a6b)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/43e7376d-d7f9-4111-87c6-ad55b25c3a04)

### Mobile
![image](https://github.com/przemekdan1/Songbook/assets/101727232/69a2d567-406e-4c8d-a292-df2b45dc403a)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/68774b17-1335-4869-8c59-ee7049fc7846)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/183b77d4-8838-4706-9754-21a6aecd5982)
![image](https://github.com/przemekdan1/Songbook/assets/101727232/9771996f-dd8f-4843-b30a-c8b2cfa0a817)



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#database-description">Database description</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#contact">Contact</a></li>
    
  </ol>
</details>


### ERD DIAGRAM
![image](https://github.com/przemekdan1/Songbook/assets/101727232/801f5d1d-c8c9-4b9a-acc3-d17c3d34615a)


## Database Description

### One-to-Many Relationship between "user" and "role":

- The **user** table has a primary key `id_user`.
- The **role** table has a foreign key `id_role` referencing `id_user` in the **user** table.
- This implies that one user can have multiple roles.

### One-to-Many Relationship between "user" and "user_details":

- The **user** table has a primary key `id_user`.
- The **user_details** table has a foreign key `id_user_details` referencing `id_user` in the **user** table.
- This implies that one user can have multiple user details.

### One-to-Many Relationship between "artists" and "vsong_informations":

- The **artists** table has a primary key `id_artist`.
- The **vsong_informations** table has a foreign key `id_artist` referencing `id_artist` in the **artists** table.
- This implies that one artist can have multiple song informations.

### One-to-Many Relationship between "projects" and "vsong_informations":

- The **projects** table has a primary key `id_project`.
- The **vsong_informations** table has a foreign key `id_project` referencing `id_project` in the **projects** table.
- This implies that one project can have multiple song informations.



### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/przemekdan1/Songbook.git
   ```
2. Build the Docker image
   ```sh
   docker build -t myfuelpal-app .
   ```
3. Run Docker Compose
   ```sh
   docker-compose up -d
   ```
4. Import Database from sql file

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Roadmap

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/Features`)
3. Commit your Changes (`git commit -m 'Add some Features'`)
4. Push to the Branch (`git push origin features/Features`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Przemek Danak - [Linkedin](www.linkedin.com/in/przemysław-danak-0406b0245)

Email: przemekdan1@gmail.com




