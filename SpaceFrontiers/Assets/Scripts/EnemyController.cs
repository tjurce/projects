using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EnemyController : MonoBehaviour
{
    public GameObject enemyExplosionParticle;
    public Transform[] patrolPoints;
    public float speed;
    int currentPoint = 0;

    void Start()
    {
        transform.position = patrolPoints[0].position;
        currentPoint = 0;
    }


    // Update is called once per frame
    public void Update()
    {
        if (transform.position == patrolPoints[currentPoint].position)
        {
            if (currentPoint == patrolPoints.Length - 1)
                currentPoint = 0;
            else
                currentPoint++;
        }
        transform.position = Vector3.MoveTowards(transform.position, patrolPoints[currentPoint].position, speed * Time.deltaTime);

        if (patrolPoints[currentPoint].position.x - transform.position.x > 0)
        {
            FlipLeft();
        }

        if (patrolPoints[currentPoint].position.x - transform.position.x < 0)
        {
            FlipRight();
        }
    }

    void FlipLeft()
    {
        if (transform.eulerAngles.y == 0)
            transform.eulerAngles = new Vector3(0, 180, 0);
    }

    void FlipRight()
    {
        if (transform.eulerAngles.y == 180)
            transform.eulerAngles = new Vector3(0, 0, 0);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        if (collision.tag == "Bullet")
        {
            GameObject clone = Instantiate(enemyExplosionParticle, new Vector3(transform.position.x, transform.position.y, transform.position.z - 1f), Quaternion.identity);
            Destroy(gameObject);
            GameManager.gm.explosionSound.Play();
            Destroy(collision.gameObject);
            Destroy(clone, 3f);
            GameManager.gm.AddEnemyToScore(50);
        }
        if (collision.tag == "PlayerTag")
        {
            GameManager.gm.GameOver();
        }
    }
}