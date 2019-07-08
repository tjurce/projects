using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraController : MonoBehaviour {

    public GameObject player;

    private Vector3 offset;
    private Vector3 speed = Vector3.zero;

    public float dampTime;

	// Use this for initialization
	void Start () {
        offset = transform.position - player.transform.position;
	}
	
	// Update is called once per frame
	void LateUpdate () {
        if (player != null)
        {
            Vector3 destination = player.transform.position + offset;
            transform.position = Vector3.SmoothDamp(transform.position, destination, ref speed, dampTime);
        }
	}
}
