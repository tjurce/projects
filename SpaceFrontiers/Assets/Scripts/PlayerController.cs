using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerController : MonoBehaviour {

    public Rigidbody2D playerRB;
    public GameObject[] engineParticles;
    public GameObject bullet;
    public AudioSource laserBeam;

    public float speed = 15;
    public float engineEnergy = 2;
    public float engineForce = 15;
    private float timer = 0;

    private bool engineActive;
    private bool isRight;

	// Use this for initialization
	void Start () {
        isRight = true;
	}
	
	// Update is called once per frame
	void FixedUpdate () {
        if (transform.position.y <= -10)
            GameManager.gm.GameOver();

        float moveHorizontal = Input.GetAxis("Horizontal");

        Vector2 movement = new Vector2(moveHorizontal, 0);

        playerRB.AddForce(movement * speed);

        if (moveHorizontal < 0)
            FlipLeft();
        if (moveHorizontal > 0)
            FlipRight();

        engineActive = (Input.GetKey(KeyCode.W) || Input.GetKey(KeyCode.UpArrow)) && engineEnergy > 0;
        for (int i = 0; i < 2; i++)
            engineParticles[i].GetComponent<ParticleSystem>().Stop();
        for (int i = 2; i < 4; i++)
            engineParticles[i].GetComponent<ParticleSystem>().Play();


        if (engineActive)
        {
            timer = 0;
            for (int i = 0; i < 2; i++)
                engineParticles[i].GetComponent<ParticleSystem>().Play();
            for (int i = 2; i < 4; i++)
                engineParticles[i].GetComponent<ParticleSystem>().Stop();

            playerRB.AddForce(new Vector2(0, engineForce));
            engineEnergy -= Time.deltaTime;
            if (engineEnergy <= 0)
            {
                engineActive = false;
                for (int i = 0; i < 4; i++)
                    engineParticles[i].GetComponent<ParticleSystem>().Stop();
            }
        }

        if (!engineActive && engineEnergy <= 2)
        {
            timer += Time.deltaTime;
            if (timer >= 2)
                engineEnergy += Time.deltaTime;
        }

        if (Input.GetKeyDown(KeyCode.Mouse0))
            Shoot(bullet);
	}

    public void Shoot(GameObject bullet)
    {
        Vector2 shootPosition = new Vector2();
        if (isRight)
        {
            shootPosition.x = transform.position.x + 1;
            shootPosition.y = transform.position.y;
        }
        if (!isRight)
        {
            shootPosition.x = transform.position.x - 1;
            shootPosition.y = transform.position.y;
        }
        float angle = AngleBetweenTwoPoints(transform.position, Camera.main.ScreenToWorldPoint(Input.mousePosition));
        Instantiate(bullet, shootPosition, Quaternion.Euler(new Vector3(0f, 0f, angle)));
        laserBeam.Play();
    }

    float AngleBetweenTwoPoints(Vector3 a, Vector3 b)
    {
        return Mathf.Atan2(a.y - b.y, a.x - b.x) * Mathf.Rad2Deg;
    }

    void FlipLeft()
    {
        isRight = false;
        if(transform.eulerAngles.y == 0)
            transform.eulerAngles = new Vector3(0, 180, 0);
    }

    void FlipRight()
    {
        isRight = true;
        if (transform.eulerAngles.y == 180)
            transform.eulerAngles = new Vector3(0, 0, 0);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        if (collision.tag == "Finish")
            GameManager.gm.Finish();
    }
}
