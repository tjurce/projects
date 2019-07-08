using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Background : MonoBehaviour
{
    public Transform Ccamera;
    public float speedCoefficient;
    Vector3 lastpos;

    void Start()
    {
        lastpos = Ccamera.position;
    }

    void Update()
    {
        transform.position -= ((lastpos - Ccamera.position) * speedCoefficient);
        lastpos = Ccamera.position;
    }
}