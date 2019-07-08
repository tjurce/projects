using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bullet : MonoBehaviour {

    public float speed = 1.5f;
    public Rigidbody2D rb;
    private float lifetime = 5;

    // Use this for initialization
    void Start () {
        Vector3 mousePosition = Camera.main.ScreenToWorldPoint(Input.mousePosition);
        mousePosition.z = 0;
        rb.velocity = (mousePosition-transform.position) * speed;
    }
	
	// Update is called once per frame
	void Update () {
        lifetime -= Time.deltaTime;
        if (lifetime <= 0)
            Destroy(gameObject);
	}
}
